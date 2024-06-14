<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/nieuws-berichten', [AdminController::class, 'showNewsIndex'])->name('admin');
Route::delete('/dishes/{dish}', [AdminController::class, 'destroy'])->name('admin.dishes.destroy');
