<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //Website
    Route::get('/', [WebsiteController::class, 'index'])->name('website.home');

    //Blog
    Route::get('/criar-post',[PostController::class, 'index'])->name('post.index');
    Route::post('/publicar-post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{auth}/{path}', [PostController::class, 'show'])->name('post.show');

    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
