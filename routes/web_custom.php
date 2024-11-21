<?php

use App\Http\Controllers\Api\ShortController;
use App\Http\Controllers\Web\ShortWebController;
use Illuminate\Support\Facades\Route;

Route::get('/web', [ShortWebController::class, 'index']);
Route::get('/test', [ShortWebController::class, 'test']);


Route::get("/s/{short_id}", [ShortController::class, 'redirect_url'])->name('short.id');
