<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('login', [UserController::class,'login'])->name('login');
Route::post('login', [UserController::class,'authenticate'])->name('users.authenticate');
Route::post('register', [UserController::class,'store'])->name('users.store');
Route::get('register', [UserController::class,'register'])->name('register');
Route::post('logout', [UserController::class,'logout'])->name('users.logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/', function () {
        return redirect(route('products.index')); 
    });

    Route::resource('products', ProductController::class);
});

