<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Get all armadas
Route::controller(\App\Http\Controllers\Api\ArmadaController::class)
    ->prefix('armadas')
    ->group(function () {
        Route::get('/', 'index');
});