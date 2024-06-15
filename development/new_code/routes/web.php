<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TabletOrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dishes');

Route::get('/admin/nieuws-berichten', [NewsController::class, 'show'])->name('admin.news.index');
Route::post('/admin/nieuws-berichten', [NewsController::class, 'store'])->name('admin.news.store');

Route::delete('/dishes/{dish}', [AdminController::class, 'destroy'])->name('admin.dishes.destroy');

Route::get('/nieuws', [DashboardController::class, 'showNews'])->name('news.show');

Route::get('/admin/dishes/create', [AdminController::class, 'create'])->name('admin.dishes.create');
Route::post('/admin/dishes', [AdminController::class, 'store'])->name('admin.dishes.store');

Route::get('/dishes/{dish}/edit', [AdminController::class, 'edit'])->name('admin.dishes.edit');
Route::put('/dishes/{dish}', [AdminController::class, 'update'])->name('admin.dishes.update');

Route::get('/contact', [CustomerController::class, 'index'])->name('customer.contact');

Route::get('/tablet', [TabletOrderController::class, 'showTabletDashboard'])->name('tablet.dashboard');
Route::post('/tablet', [TabletOrderController::class, 'loginTable'])->name('tablet.number.set');

Route::get('/tablet/bestellen', [TabletOrderController::class, 'showTabletIndex'])->name('tablet.index');
Route::get('/tablet/bestellen/{dishtype}', [TabletOrderController::class, 'showTabletDishes'])->name('tablet.category');
Route::post('/tablet/bestellen/toevoegen/{dish}', [TabletOrderController::class, 'addToOrder'])->name('order.add');

Route::get('/tablet/bestellingen', [TabletOrderController::class, 'showOrders'])->name('orders.index');
Route::post('/tablet/bestellingen', [TabletOrderController::class, 'processOrders'])->name('orders.process');

Route::get('/admin/reserveringen', [ReservationController::class, 'index'])->name('reservations.index');

Route::post('/reservations/{reservation}/assign-table', [ReservationController::class, 'assignTable'])
    ->name('reservations.assignTable');

Route::fallback(function () {
    return view('index');
});
