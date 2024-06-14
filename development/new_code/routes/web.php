<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::delete('/dishes/{dish}', [AdminController::class, 'destroy'])->name('admin.dishes.destroy');
Route::get('/admin/dishes/create', [AdminController::class, 'create'])->name('admin.dishes.create');
Route::post('/admin/dishes', [AdminController::class, 'store'])->name('admin.dishes.store');
