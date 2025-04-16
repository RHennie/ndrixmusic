<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoundbankController extends Controller
{
    public function index()
    {
        // Get all files from the 'soundbank' folder on the public disk
        $files = Storage::disk('public')->files('soundbank');

        return view('soundbank.index', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'audio' => 'required|mimes:mp3,wav|max:10240',
        ]);

        $file = $request->file('audio');
        $filename = $file->getClientOriginalName();

        // Store file publicly in the 'soundbank' directory using the public disk
        Storage::disk('public')->putFileAs('soundbank', $file, $filename);

        return redirect()->route('soundbank.index')->with('success', 'Upload successful!');
    }
}
