<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dishes');

Route::get('/admin/nieuws-berichten', [NewsController::class, 'show'])->name('admin.news.index');
Route::post('/admin/nieuws-berichten', [NewsController::class, 'store'])->name('admin.news.store');

Route::delete('/dishes', [AdminController::class, 'destroy'])->name('admin.dishes.destroy');

Route::get('/nieuws', [DashboardController::class, 'showNews'])->name('news.show');

Route::get('/admin/dishes/create', [AdminController::class, 'create'])->name('admin.dishes.create');
Route::post('/admin/dishes', [AdminController::class, 'store'])->name('admin.dishes.store');
