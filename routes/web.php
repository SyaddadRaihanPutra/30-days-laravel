<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class)->except(['create', 'edit']);
Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
