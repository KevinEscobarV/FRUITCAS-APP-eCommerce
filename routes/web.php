<?php

use App\Http\Controllers\BotManController;
use App\Http\Livewire\ProductsTable;
use App\Http\Livewire\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\ShoppingCart;

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteAction;

Route::resource('users', UserController::class)->names('users');

Route::resource('roles', RoleController::class)->names('roles');


Route::get('/', WelcomeController::class);

route::get('search', SearchController::class)->name('search');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('prducts/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');


Route::middleware(['auth'])->group(function (){

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('orders/create',CreateOrder::class)->name('orders.create');

    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    Route::get('orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment');
    
    Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');
    
    Route::get('webhooks', WebhooksController::class);  

});


Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dashboard', HomeController::class)->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])->get('/products', ProductsTable::class)

->name('products');

Route::get('/contact', Contact::class)

->name('contact');






