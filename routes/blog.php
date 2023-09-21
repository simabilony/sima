<?php

use App\Http\Controllers\API\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{blog}/show', [BlogController::class, 'show']);
Route::post('/blog/store', [BlogController::class, 'store']);
Route::put('/blog/{blog}/update', [BlogController::class, 'update']);
Route::delete('/blog/{blog}/delete', [BlogController::class, 'destroy']);


Route::get('/category/{category}/blog', [BlogController::class, 'indexBlogByCategory']);
