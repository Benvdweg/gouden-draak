<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

