<?php

use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SitemapController;
use App\Livewire\SewaAlphardSurabaya;
use App\Livewire\SewaHiaceSurabaya;
use Illuminate\Support\Facades\Route;

Route::controller(BaseController::class)
    ->group(function() {
        Route::get('/', 'index')->name('home');
        Route::get('sitemap.xml', 'sitemap')->name('sitemap');
    });
// ======
// ARMADA
// ======
Route::controller(ArmadaController::class)
    ->prefix('armada')
    ->group(function() {
        Route::get('/', 'index')->name('armada.index');
        Route::get('/{armada:slug}', 'show')->name('armada.show');
    });

// ======
// ARTIKEL
// ======
Route::controller(BlogController::class)
    ->group(function() {
        Route::get('/blog', 'index')->name('blog.index');
        Route::get('/{year}/{month}/{post}', 'show')
            ->where(['year' => '[0-9]{4}', 'month' => '[0-9]{1,2}'])
            ->name('blog.show');
    });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';


// ======
// OMPAGE
// ======
Route::get('sewa-hiace-surabaya', SewaHiaceSurabaya::class)->name('sewa-hiace-surabaya');
Route::get('sewa-alphard-surabaya', SewaAlphardSurabaya::class)->name('sewa-alphard-surabaya');

// Catch-all for plain-permalink posts (/{slug}) — must stay last so it only
// matches paths no other route above claimed.
Route::get('{slug}', [BlogController::class, 'showPlain'])->name('blog.show-plain');
