<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\AdminauthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ErrorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ShippingMethodController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WebsettingController;
use App\Http\Controllers\Backend\WhilistController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\CheckoutController;
use App\Http\Controllers\Backend\OderController;

use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\CartController as ControllersCartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\UserDashboard\UserdashboardController;

// ===========================
// 🔷 Public Routes
// ===========================
Route::get('/', [FrontendController::class, 'frontend'])->name('frontend');
Route::get('product/{slug}', [FrontendController::class, 'productdetails'])->name('productdetails');
Route::get('error', [ErrorController::class, 'error'])->name('error');
Route::post('/logout', function () {
    Auth::logout(); return redirect('/login');})->name('logout');
// ===========================
// 🔷 User Authentication
// ===========================
Route::get('login', [UserdashboardController::class, 'login'])->name('userlogin');
Route::post('user-auth', [UserdashboardController::class, 'user_auth'])->name('user.auth');

// ===========================
// 🔒 Protected User Routes (User Middleware)
// ===========================
Route::middleware(['User'])->group(function () {
    Route::get('dashboard', [UserdashboardController::class, 'dashboard'])->name('dashboard');
});

// ===========================
// 🔷 Admin Authentication
// ===========================
Route::get('admin/login', [AdminauthController::class, 'login'])->name('login');
Route::post('/', [AdminauthController::class, 'auth_login'])->name('auth_login');

// ===========================
// 🔒 Admin Panel Routes (Admin Middleware)
// ===========================
Route::middleware(['Admin'])->group(function () {
    Route::get('admin', [AdminController::class, 'admin'])->name('admin');

    // Admin Resource Routes
    Route::resources([
        'role'       => RoleController::class,
        'user'       => UserController::class,
        'slider'     => SliderController::class,
        'websetting' => WebsettingController::class,
        'category'   => CategoryController::class,
        'subcategory'=> SubcategoryController::class,
        'products'   => ProductController::class,
        'shipping'   => ShippingMethodController::class,
        'coupon'   => CouponController::class,
    ]);
});

Route::resource('whilist', WhilistController::class);
Route::post('/whilist/insert/{product_id}', [WhilistController::class, 'whilistinsert'])->name('whilist.insert');
Route::get('/check/{product_id}', [WhilistController::class, 'checkwhilist'])->name('check.whilist');
Route::get('/whilsit/remove/{product_id}', [WhilistController::class, 'whilistremove'])->name('whilist.remove');
Route::get('whilist', [FrontendController::class, 'whilist'])->name('whilist.index');



Route::get('addto/wishlist/cart/{wishlist_id}', [CartController::class, 'addtowhilistcart'])->name('wishlist.cart');
Route::post('addto/cart/{product_id}', [CartController::class, 'addtocart'])->name('addto.cart');
Route::delete('/cart/remove/{id}', [CartController::class, 'removecart'])->name('remove.cart');
Route::get('/cart/view', [CartController::class, 'cartview'])->name('remove.view');
Route::get('/clearshopping/cart/{user_id}', [CartController::class, 'clearshoppingcart'])->name('clearshopping.cart');
Route::get('/cartremove/{id}', [CartController::class, 'cartremove'])->name('cart.remove');

Route::post('/update/cart', [CartController::class, 'cartupdate'])->name('update.cart');

// web.php
Route::get('/get-shipping-charge/{id}', [CartController::class, 'getShippingCharge']);

Route::get('shipping/get/{shipping_id}', [CartController::class, 'shippingget'])->name('shipping.get');
Route::post('/update-cart-ajax', [CartController::class, 'updateCartAjax']);

Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('checkout/confirm', [CheckoutController::class, 'checkoutconfirm'])->name('checkoutconfirm');
// web.php
Route::post('/autosave-checkout', [CheckoutController::class, 'autosaveCheckout'])->name('autosave.checkout');

// routes/web.php
Route::get('/search-product-ajax', [FrontendController::class, 'searchproductajax'])->name('searchproductajax');

Route::post('/search-product-ajax', [FrontendController::class, 'searchsubmit'])->name('searchsubmit');

Route::get('order', [OderController::class, 'allorder'])->name('allorder');


















