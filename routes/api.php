<?php

use App\Http\Controllers\Api\ArmadaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Get all armadas
Route::controller(ArmadaController::class)
    ->prefix('armadas')
    ->group(function () {
        Route::get('/', 'index');
    });
