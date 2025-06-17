<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CustomizePainting;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


// Auth::routes();
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [DashboardController::class, 'login'])->name('loginAuth');
Route::post('login/form', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [FrontendController::class, 'productDetail'])->name('product.detail');
Route::get('/portfoilio', [FrontendController::class, 'portfoilio'])->name('portfoilio');
Route::get('/custom-painting', [FrontendController::class, 'customPainting'])->name('customPainting');
Route::post('/custom-painting/order', [CustomizePainting::class, 'paintingStore'])->name('paintingStore');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/youtube-channel', [FrontendController::class, 'youtube'])->name('youtube');
Route::post('/contact', [FrontendController::class, 'ContactUsFrom'])->name('contact.store');

Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('product.addReview');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/cart/order', [CartController::class, 'order'])->name('order');

Route::get('/order-complete', [FrontendController::class, 'thankyou'])->name('thankyou');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/dashbord', [DashboardController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/admin/category', [DashboardController::class, 'categories'])->name('categories');
    Route::get('/admin/portfolio', [DashboardController::class, 'portfolio'])->name('portfolio');
    Route::post('/admin/portfolio/store', [DashboardController::class, 'portfolioStore'])->name('portfolioStore');
    Route::delete('/admin/portfolio/delete/{id}', [DashboardController::class, 'portfolioDestroy'])->name('portfolioDestroy');
    Route::resource('admin/categories', CategoryController::class);

    Route::get('/admin/products', [DashboardController::class, 'product'])->name('product');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/delet/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/{id}/delete-image', [ProductController::class, 'deleteImage'])->name('product.deleteImage');


    Route::get('/admin/reviews', [ReviewController::class, 'manageReviews'])->name('admin.reviews');
    Route::patch('/admin/reviews/toggle-status/{id}', [ReviewController::class, 'toggleStatus'])->name('admin.reviews.toggleStatus');
    Route::delete('/admin/reviews/delete/{id}', [ReviewController::class, 'reviewDelete'])->name('admin.reviewDelete');


    Route::get('/admin/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/admin/orders/{id}', [DashboardController::class, 'orderShow'])->name('orderShow');
    Route::delete('/admin/orders/{id}', [DashboardController::class, 'orderDelete'])->name('orderDelete');
    // Route::resource('admin/products', ProductController::class);
    Route::get('/admin/customize-order', [CustomizePainting::class, 'paintingIndex'])->name('paintingIndex');
    Route::get('/admin/customize-order/{id}', [CustomizePainting::class, 'paintingShow'])->name('paintingShow');
    Route::delete('/admin/customize-order/{id}', [CustomizePainting::class, 'paintingDestroy'])->name('paintingDestroy');
    Route::get('/admin/youtube-videos', [DashboardController::class, 'youtubeVideo'])->name('youtubeVideo');
    Route::post('/admin/youtube-video-store', [DashboardController::class, 'youtubeVideoStore'])->name('youtubeVideoStore');
    Route::delete('/admin/youtube-video/{id}', [DashboardController::class, 'youtubeVideoDestroy'])->name('youtubeVideoDestroy');

    Route::get('/admin/conatct', [DashboardController::class, 'contactData'])->name('contactData');
    Route::delete('/admin/contact/{id}', [DashboardController::class, 'deleteContactData'])->name('contact.delete');
});




Route::fallback(function () {
    return redirect('/');
});
