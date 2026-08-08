<?php

use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', FrontPageController::class)->name('home');

Route::get('sitemap.xml', SitemapController::class)->name('sitemap');

Route::get('armada', [ArmadaController::class, 'index'])->name('armada.index');
Route::get('armada/{armada:slug}', [ArmadaController::class, 'show'])->name('armada.show');

Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('{year}/{month}/{post}', [BlogController::class, 'show'])
    ->where(['year' => '[0-9]{4}', 'month' => '[0-9]{1,2}'])
    ->name('blog.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

// Catch-all for plain-permalink posts (/{slug}) — must stay last so it only
// matches paths no other route above claimed.
Route::get('{slug}', [BlogController::class, 'showPlain'])->name('blog.show-plain');
