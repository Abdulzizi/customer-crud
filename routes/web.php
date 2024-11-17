<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'index'])->name('home');

Route::resource('customers', CustomerController::class);

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
