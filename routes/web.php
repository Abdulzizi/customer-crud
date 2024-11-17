<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'index'])->name('home');

Route::get('customers/trash', [CustomerController::class, 'trashIndex'])->name('customers.trash');
Route::patch('customers/{id}/trash', [CustomerController::class, 'trashRestore'])->name('customers.restore');
Route::delete('customers/{id}/trash', [CustomerController::class, 'trashForceDelete'])->name('customers.forceDelete');

Route::resource('customers', CustomerController::class);

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
