<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('login', [UserController::class,'login'])->name('login');
Route::get('register', [UserController::class,'register'])->name('register');

Route::get('/', function () {
    return redirect(route('products.index')); 
});

Route::resource('products', ProductController::class);