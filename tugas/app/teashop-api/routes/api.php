<?php
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));
//posts
Route::apiResource('/menu', App\Http\Controllers\Api\menuController::class);
Route::apiResource('/deskripsi', App\Http\Controllers\Api\deskripsiController::class);