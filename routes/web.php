<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\User\DashboardController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('/', LandingPageController::class);
Route::resource('/contact',ContactController::class);
Route::resource('/about',AboutController::class);
Route::resource('/blog',BlogPostController::class);
Route::resource('/newsletter',NewsLetterController::class);


Route::name('user.')->prefix('user')->middleware(['auth'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
