<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\Admin\WisataDocumemnationController;
use App\Http\Controllers\Admin\WisataDocumentationController;
use App\Http\Controllers\Admin\WisataPriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PubllishController;
use App\Http\Controllers\UploadFileCkeditorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/update/publish', [PubllishController::class, 'published'])->name('update.publish');

    Route::post('/upload-file-ckeditor', UploadFileCkeditorController::class)->name('admin.upload-file-ckeditor');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // tours 
    Route::resource('/paket-wisata', WisataController::class);

    // tours schedule 
    Route::get('/paket-wisata-schedule/{uuid}', [WisataController::class, 'schedule'])->name('paket-wisata.schedule');
    Route::post('/paket-wisata-schedule/{uuid}', [WisataController::class, 'store_schedule'])->name('paket-wisata.schedule.store');
    Route::delete('/paket-wisata-schedule/{id}', [WisataController::class, 'destroy_schedule'])->name('paket-wisata.schedule.destroy');
    Route::get('/paket-wisata-schedule/{uuid}/{id}/edit', [WisataController::class, 'edit_schedule'])->name('paket-wisata.schedule.edit');
    Route::post('/paket-wisata-schedule/{id}/update', [WisataController::class, 'update_schedule'])->name('paket-wisata.schedule.update');

    // Tour price 
    Route::get('/paket-wisata-price/{uuid}', [WisataPriceController::class, 'index'])->name('paket-wisata.price');
    Route::post('/paket-wisata-price/{uuid}', [WisataPriceController::class, 'store'])->name('paket-wisata.price.store');
    Route::delete('/paket-wisata-price/{id}', [WisataPriceController::class, 'destroy'])->name('paket-wisata.price.destroy');
    Route::put('/paket-wisata-price/{id}/update', [WisataPriceController::class, 'update'])->name('paket-wisata.price.update');

    // Tour documentation 
    Route::get('/paket-wisata-documentation/{uuid}', [WisataDocumentationController::class, 'index'])->name('paket-wisata.documentation');
    Route::post('/paket-wisata-documentation/{id}', [WisataDocumentationController::class, 'store'])->name('paket-wisata.documentation.store');
    Route::delete('/paket-wisata-documentation/{id}/delete', [WisataDocumentationController::class, 'destroy'])->name('paket-wisata.documentation.destroy');

    // rent car 
    Route::resource('/rent-car', RentController::class);
});

require __DIR__.'/auth.php';
