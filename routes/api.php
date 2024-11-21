<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ShortController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/short", [ShortController::class, 'store'])->middleware('auth:sanctum')->name('short.store');
Route::get("/short-list", [ShortController::class, 'index'])->middleware('auth:sanctum')->name('short.list');
Route::get("/redirect-url/{short_id}", [ShortController::class, 'redirect_url']);

Route::post("/login", [AuthController::class, 'login'])->name('login');
Route::post("/register", [AuthController::class, 'register'])->name('register');
Route::get("/logout", [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
Route::get("/me", [AuthController::class, 'me'])->middleware('auth:sanctum')->name('logout');

