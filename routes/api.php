<?php

use App\Http\Controllers\API\V1\WebsiteController;
use App\Http\Controllers\API\V1\PostController;
use Illuminate\Support\Facades\Route;

Route::apiResource("websites", WebsiteController::class)->except('update', 'destroy');
Route::apiResource("websites.posts", PostController::class)->middleware('check.website.existence');
Route::post('/websites/{website}/subscribe', [WebsiteController::class, 'subscribe'])->name('websites.subscribe');
