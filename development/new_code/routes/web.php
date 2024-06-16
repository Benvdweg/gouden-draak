<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TabletOrderController;
use App\Http\Controllers\WaiterCallController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.index');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/orders', [CheckoutController::class, 'showOrders'])->name('checkout.orders');
Route::get('/orders/{order}/orderLines', [CheckoutController::class, 'showOrderLines'])->name('checkout.orderLines');
Route::get('/orders/{orderLine}/comment', [CheckoutController::class, 'showComment'])->name('checkout.comment');
Route::put('/orders/{orderId}/update-comment', [CheckOutController::class, 'updateComment'])
    ->name('orders.updateComment');

Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/admin', [DishController::class, 'index'])->name('admin.dishes');

Route::get('/admin/nieuws-berichten', [NewsController::class, 'show'])->name('admin.news.index');
Route::post('/admin/nieuws-berichten', [NewsController::class, 'store'])->name('admin.news.store');

Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->name('admin.dishes.destroy');
Route::get('/admin/dishes/create', [DishController::class, 'create'])->name('admin.dishes.create');
Route::post('/admin/dishes', [DishController::class, 'store'])->name('admin.dishes.store');
Route::get('/dishes/{dish}/edit', [DishController::class, 'edit'])->name('admin.dishes.edit');
Route::put('/dishes/{dish}', [DishController::class, 'update'])->name('admin.dishes.update');
Route::put('/waiter-calls', [DishController::class, 'update'])->name('admin.dishes.update');

Route::get('/contact', [CustomerController::class, 'showContact'])->name('customer.contact');
Route::get('/nieuws', [CustomerController::class, 'showNews'])->name('customer.news');

Route::get('/admin/reserveringen', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('/reservations/{reservation}/assign-table', [ReservationController::class, 'assignTable'])
    ->name('reservations.assignTable');

Route::get('/admin/waiter-calls', [WaiterCallController::class, 'index'])->name('waiter.calls');
Route::patch('/admin/waiter-calls/{waiterCall}', [WaiterCallController::class, 'update'])->name('waiter.call.handle');

Route::get('/tablet', [TabletOrderController::class, 'showTabletDashboard'])->name('tablet.dashboard');
Route::post('/tablet', [TabletOrderController::class, 'loginTable'])->name('tablet.number.set');

Route::get('/tablet/bestellen', [TabletOrderController::class, 'showTabletIndex'])->name('tablet.index');
Route::get('/tablet/bestellen/{dishtype}', [TabletOrderController::class, 'showTabletDishes'])->name('tablet.category');

Route::post('/tablet/bestellen/toevoegen/{dish}', [TabletOrderController::class, 'addToOrder'])->name('order.add');

Route::post('/order/favorite/{dish}', [TabletOrderController::class, 'favorite'])->name('order.favorite');
Route::post('/tabletOrder/favorite/{dish}', [TabletOrderController::class, 'favorite'])->name('tabletOrder.favorite');
Route::get('/tablet/favorites', [TabletOrderController::class, 'showFavorites'])->name('tablet.favorites');

Route::get('/tablet/order-history', [TabletOrderController::class, 'orderHistory'])->name('tablet.order_history');
Route::post('/tablet/addWhole', [TabletOrderController::class, 'addWholeOrder'])->name('tablet.addWhole');
Route::get('/order/{round_number}', [TabletOrderController::class, 'showPrevOrder'])->name('order.show');

Route::get('/tablet/bestellingen', [TabletOrderController::class, 'showOrders'])->name('orders.index');
Route::post('/tablet/bestellingen', [TabletOrderController::class, 'processOrders'])->name('orders.process');

Route::get('/tablet/ober', [TabletOrderController::class, 'showCallWaiter'])->name('tablet.call.waiter');
Route::post('/tablet/ober/call', [WaiterCallController::class, 'store'])->name('tablet.store.call');

Route::fallback(function () {
    return view('customer.index');
});
