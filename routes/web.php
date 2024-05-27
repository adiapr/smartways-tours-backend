<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadFileCkeditorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/upload-file-ckeditor', UploadFileCkeditorController::class)->name('admin.upload-file-ckeditor');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/paket-wisata', WisataController::class);
});

require __DIR__.'/auth.php';
