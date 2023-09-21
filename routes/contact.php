<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/contact', [\App\Http\Controllers\API\ContactController::class, 'index']);
Route::get('/contact/{blog}/show', [\App\Http\Controllers\API\ContactController::class, 'show']);
Route::post('/contact/store', [\App\Http\Controllers\API\ContactController::class, 'store']);
Route::put('/contact/{blog}/update', [\App\Http\Controllers\API\ContactController::class, 'update']);
Route::delete('/contact/{blog}/delete', [\App\Http\Controllers\API\ContactController::class, 'destroy']);
