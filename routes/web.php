<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoundbankController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/test', function () {
    return view('welcome');
})->name('test');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function ()  {
    Route::get('/soundbank', [SoundbankController::class, 'index'])->name('soundbank.index');
    Route::post('/soundbank/upload', [SoundbankController::class, 'upload'])->name('soundbank.upload');
    Route::delete('/soundbank/delete/{file}', [SoundbankController::class, 'delete'])->name('soundbank.delete');

});

Route::middleware('auth')->group(function ()  {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


