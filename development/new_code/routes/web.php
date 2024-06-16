<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PickUpController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TabletOrderController;
use App\Http\Controllers\WaiterCallController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('customer.index');
});
Route::get('/contact', [CustomerController::class, 'showContact'])->name('customer.contact');
Route::get('/nieuws', [CustomerController::class, 'showNews'])->name('customer.news');
Route::get('/menu', [CustomerController::class, 'showMenu'])->name('show.basic.menu');
Route::get('/download-pdf', [MenuController::class, 'downloadPdf'])->name('download.pdf');

// Pickup routes
Route::prefix('afhalen')->group(function () {
    Route::get('/categories', [PickUpController::class, 'showCategoryMenu'])->name('pick-up.menu-category-show');
    Route::get('/{category}', [PickUpController::class, 'showDishMenu'])->name('pick-up.menu-dishes-show');
    Route::post('/bestellen/toevoegen/{dish}', [PickUpController::class, 'addToOrder'])->name('pickup.order.add');
    Route::get('/winkelwagen', [PickUpController::class, 'showOrders'])->name('pick-up-orders-cart');
    Route::post('/bestellen', [PickUpController::class, 'processOrders'])->name('pick-up-process-orders');
});

// Tablet routes
Route::prefix('tablet')->group(function () {
    Route::get('/', [TabletOrderController::class, 'showTabletDashboard'])->name('tablet.dashboard');
    Route::post('/', [TabletOrderController::class, 'loginTable'])->name('tablet.number.set');
    Route::get('/bestellen', [TabletOrderController::class, 'showTabletIndex'])->name('tablet.index');
    Route::get('/bestellen/{dishtype}', [TabletOrderController::class, 'showTabletDishes'])->name('tablet.category');
    Route::post('/bestellen/toevoegen/{dish}', [TabletOrderController::class, 'addToOrder'])->name('order.add');
    Route::get('/favorites', [TabletOrderController::class, 'showFavorites'])->name('tablet.favorites');
    Route::get('/order-history', [TabletOrderController::class, 'orderHistory'])->name('tablet.order_history');
    Route::post('/addWhole', [TabletOrderController::class, 'addWholeOrder'])->name('tablet.addWhole');
    Route::get('/bestellingen', [TabletOrderController::class, 'showOrders'])->name('orders.index');
    Route::post('/bestellingen', [TabletOrderController::class, 'processOrders'])->name('orders.process');
    Route::get('/ober', [TabletOrderController::class, 'showCallWaiter'])->name('tablet.call.waiter');
    Route::post('/ober/call', [WaiterCallController::class, 'store'])->name('tablet.store.call');
});

// Order routes
Route::prefix('order')->group(function () {
    Route::post('/favorite/{dish}', [TabletOrderController::class, 'favorite'])->name('order.favorite');
    Route::post('/tabletOrder/favorite/{dish}', [TabletOrderController::class, 'favorite'])->name('tabletOrder.favorite');
    Route::get('/{round_number}', [TabletOrderController::class, 'showPrevOrder'])->name('order.show');
});

// Checkout routes
Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/orders', [CheckoutController::class, 'showOrders'])->name('checkout.orders');
    Route::get('/orders/{order}/orderLines', [CheckoutController::class, 'showOrderLines'])->name('checkout.orderLines');
    Route::get('/orders/{orderLine}/comment', [CheckoutController::class, 'showComment'])->name('checkout.comment');
    Route::put('/orders/{orderId}/update-comment', [CheckoutController::class, 'updateComment'])->name('orders.updateComment');
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [DishController::class, 'index'])->name('admin.dishes');
    Route::get('/nieuws-berichten', [NewsController::class, 'show'])->name('admin.news.index');
    Route::post('/nieuws-berichten', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/dishes/create', [DishController::class, 'create'])->name('admin.dishes.create');
    Route::post('/dishes', [DishController::class, 'store'])->name('admin.dishes.store');
    Route::get('/reserveringen', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/waiter-calls', [WaiterCallController::class, 'index'])->name('waiter.calls');
    Route::patch('/waiter-calls/{waiterCall}', [WaiterCallController::class, 'update'])->name('waiter.call.handle');

    // CMS routes
    Route::prefix('cms')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('cms.index');
        Route::post('/pagina-maken', [PageController::class, 'store'])->name('cms.store.page');
        Route::delete('/verwijderen', [PageController::class, 'destroy'])->name('cms.destroy.page');
        Route::get('/{page}', [PageController::class, 'show'])->name('cms.show.page');
        Route::post('/{page}/component-toevoegen', [ComponentController::class, 'store'])->name('component.store');
        Route::delete('/{page}/component-verwijderen', [ComponentController::class, 'destroy'])->name('component.destroy');
        Route::post('/{page}/component-bewerken', [ComponentController::class, 'edit'])->name('component.edit.text');
        Route::post('/{page}/component-tekst-opslaan', [ComponentController::class, 'updateTextComponent'])->name('component.save.text');
        Route::post('/{page}/{component}/verander-volgorde', [ComponentController::class, 'updateComponentOrder'])->name('component.change.order');
    });
});

// Dish routes
Route::prefix('dishes')->group(function () {
    Route::delete('/{dish}', [DishController::class, 'destroy'])->name('admin.dishes.destroy');
    Route::get('/{dish}/edit', [DishController::class, 'edit'])->name('admin.dishes.edit');
    Route::put('/{dish}', [DishController::class, 'update'])->name('admin.dishes.update');
});

// Reservation routes
Route::post('/reservations/{reservation}/assign-table', [ReservationController::class, 'assignTable'])->name('reservations.assignTable');

// Custom pages (keep this at the end to avoid conflicts)
Route::get('/{page:slug}', [CustomerController::class, 'showCustomPage'])->name('customer.page-custom-show');
