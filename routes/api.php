<?php

use App\Http\Controllers\Api\MenuWisataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/menu-wisata-domestik', [MenuWisataController::class, 'domestik']);
Route::get('/menu-wisata-internasional', [MenuWisataController::class, 'internasional']);

// tours 
Route::get('/menu-wisata', [MenuWisataController::class, 'all']);
Route::get('/menu-wisata/{slug}', [MenuWisataController::class, 'show']);
