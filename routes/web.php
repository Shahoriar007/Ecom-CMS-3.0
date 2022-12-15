<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderdetailController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/product/details/{id}',[ProductController::class,'show'])->name('showProduct');
Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('addToCart');
Route::get('/view-cart',[CartController::class,'viewCart'])->middleware(['auth'])->name('shoppingCart');
Route::post('/update-cart',[CartController::class,'updateCart'])->name('updateShoppingCart');
Route::get('/catagory/{id}',[CatagoryController::class, 'show'])->name('catagoryProducts');
Route::get('/checkout',[CheckoutController::class, 'checkoutPage'])->middleware(['auth'])->name('checkoutPage');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->middleware(['auth'])->name('checkout');
Route::get('/orders', [UserController::class,'orders'])->middleware(['auth'])->name('orders');
Route::get('/address', [UserController::class,'address'])->middleware(['auth'])->name('address');
Route::get('/details', [UserController::class,'details'])->middleware(['auth'])->name('details');
Route::post('/dashboard', [UserController::class, 'changeDetails'] )->middleware(['auth'])->name('accountDetails');
Route::post('/remove/cart/product', [CartController::class, 'removeCartProduct'])->name('removeCartProduct');
Route::get('/allProducts',[ProductController::class,'showAllProducts'])->name('allProducts');
Route::get('/dashboard', [UserController::class, 'viewDashboard'] )->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';






Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

// Admin view
Route::prefix('admin')->group(function(){

    Route::get('/nav', [NavbarController::class, 'index'])->middleware(['auth:admin', 'verified'])->name('navbar');
    Route::post('/nav', [NavbarController::class, 'store'])->middleware(['auth:admin', 'verified'])->name('createNav');
    Route::get('/socialMedia', [SocialmediaController::class, 'index'])->middleware(['auth:admin', 'verified'])->name('socialMedia');
    Route::post('/socialMedia', [SocialmediaController::class, 'store'])->middleware(['auth:admin', 'verified'])->name('createSocialMedia');
    Route::get('/catagory', [CatagoryController::class, 'index'])->middleware(['auth:admin', 'verified'])->name('catagory');
    Route::post('/catagory', [CatagoryController::class, 'store'])->middleware(['auth:admin', 'verified'])->name('createCatagory');
    Route::get('/product', [ProductController::class, 'index'])->middleware(['auth:admin', 'verified'])->name('product');
    Route::post('/product', [ProductController::class, 'store'])->middleware(['auth:admin', 'verified'])->name('createProduct');
    Route::get('/logo',[LogoController::class,'index'])->middleware(['auth:admin', 'verified'])->name('logo');
    Route::post('/logo',[LogoController::class,'store'])->middleware(['auth:admin', 'verified'])->name('createLogo');
    Route::get('/slider',[SliderController::class,'index'])->middleware(['auth:admin', 'verified'])->name('slider');
    Route::post('/slider',[SliderController::class,'store'])->middleware(['auth:admin', 'verified'])->name('createSlider');
    Route::get('/stock',[StockController::class,'index'])->middleware(['auth:admin', 'verified'])->name('stock');
    Route::post('/stock',[StockController::class,'store'])->middleware(['auth:admin', 'verified'])->name('updateStock');
    Route::get('/order',[InvoiceController::class,'index'])->middleware(['auth:admin', 'verified'])->name('order');
    Route::get('/orderDetail/{id}',[OrderdetailController::class,'index'])->middleware(['auth:admin', 'verified']);
    Route::get('/view/invoice/{id}', [InvoiceController::class,'viewInvoice']);
    Route::get('/invoice/{id}/generate',[InvoiceController::class,'generateInvoice']);
    /*Route::get('/update-order-status',[OrderdetailController::class,'index'])->middleware(['auth:admin', 'verified'])->name('orderStatus');*/
    Route::post('/orderStatus',[OrderdetailController::class,'store'])->middleware(['auth:admin', 'verified'])->name('orderStatus');
       
});
 
require __DIR__.'/adminauth.php';
