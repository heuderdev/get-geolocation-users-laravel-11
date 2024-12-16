<?php

use App\Http\Controllers\Api\ShortController;
use App\Http\Controllers\Geolocation\GeoLocationController;
use App\Http\Controllers\Geolocation\GetLocationController;
use App\Http\Controllers\Web\ShortWebController;
use Illuminate\Support\Facades\Route;

Route::get('/web', [ShortWebController::class, 'index']);
Route::get('/geo', [GetLocationController::class, 'index']);
Route::get('/capture', [GeoLocationController::class, 'capture']);
Route::get('/index', [GeoLocationController::class, 'index']);
Route::get('/all-geo', [GetLocationController::class, 'show']);
Route::get('/test', [ShortWebController::class, 'test']);


Route::get("/s/{short_id}", [ShortController::class, 'redirect_url'])->name('short.id');
