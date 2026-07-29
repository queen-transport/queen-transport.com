<?php

use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', FrontPageController::class)->name('home');

Route::get('armada', [ArmadaController::class, 'index'])->name('armada.index');
Route::get('armada/{armada:slug}', [ArmadaController::class, 'show'])->name('armada.show');

Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{year}/{month}/{post}', [BlogController::class, 'show'])
    ->where(['year' => '[0-9]{4}', 'month' => '[0-9]{1,2}'])
    ->name('blog.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
