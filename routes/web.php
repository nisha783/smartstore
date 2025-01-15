<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\User\DashboardController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::resource('/', LandingPageController::class);
Route::resource('/contact',ContactController::class);
Route::resource('/about',AboutController::class);
Route::resource('/blog',BlogPostController::class);
Route::resource('/newsletter',NewsLetterController::class);
Route::resource('/product',ProductController::class);
Route::resource('/privacy',PrivacyController::class);
Route::resource('/term',TermController::class);
Route::resource('/faq',FaqController::class);
Route::resource('/checkout',CheckoutController::class);

Route::name('user.')->prefix('user')->middleware(['auth'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/wishlist', WishlistController::class);
    Route::resource('/order', OrderController::class);
});


Route::middleware(['web'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
