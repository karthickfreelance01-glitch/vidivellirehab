<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Static front-end for Erode Hope Life Foundation.
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/de-addiction', [PageController::class, 'deAddiction'])->name('de-addiction');
Route::get('/rehabilitation', [PageController::class, 'rehabilitation'])->name('rehabilitation');
Route::get('/individual-counselling', [PageController::class, 'individualCounselling'])->name('individual-counselling');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('contact.store');

/* Legacy WordPress URLs -> clean Laravel URLs */
Route::redirect('/home', '/', 301);
Route::redirect('/index.php', '/', 301);
foreach (['about', 'de-addiction', 'rehabilitation', 'individual-counselling', 'gallery', 'contact'] as $slug) {
    Route::redirect("/index.php/{$slug}", "/{$slug}", 301);
}
