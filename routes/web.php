<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WelcomeController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');



Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
Route::post('/api/gallery/{gallery}/comment', [GalleryController::class, 'comment'])->name('gallery.comment');

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/curriculum', function() {
    return view('pages.curriculum');
})->name('curriculum');

Route::get('/achievements', function() {
    return view('pages.achievements');
})->name('achievements');

Route::get('/contact', function() {
    return view('pages.contact');
})->name('contact');


