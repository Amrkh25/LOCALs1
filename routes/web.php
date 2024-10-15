<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[CategoryController::class, 'index']);
Route::get('/products/{catid?}', [ProductController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index'); // عرض صفحة الاتصال
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // معالجة نموذج الاتصال
Route::get('/show-contact', [ContactController::class, 'show'])->name('contacts.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove')->middleware('auth');
Route::get('/cart/checkout', [CartController::class, 'showAddressForm'])->name('cart.checkout');
Route::post('//cart/checkoutt', [CartController::class, 'processCheckout'])->name('cart.processCheckout');

Route::get('/add-product', [ProductController::class, 'create'])->name('products.create');
Route::post('/add-product', [ProductController::class, 'store'])->name('products.store');

Route::get('/add-category', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/add-category', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/show-orders', [OrderController::class, 'index'])->name('orders.index');


Route::get('/about',[AboutController::class,'index'])->name('about.index')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
