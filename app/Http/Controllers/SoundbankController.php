<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SoundbankController extends Controller
{
    public function index(){
    $files = Storage::files('public/soundbank');
    return view('soundbank.index', compact('files'));
    }   

    public function upload(Request $request){
        $request->validate([
            'audio' => 'required|mimes:mp3,wav,ogg|max:10240'
        ]);
        $request->file('audio')->storeAs('public/soundbank', $request->file('audio')->getClientOriginalName());

        return redirect()->route('soundbank.index')->with('success', 'Upload successful!');
    }
}
