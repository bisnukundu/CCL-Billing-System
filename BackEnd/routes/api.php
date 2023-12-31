<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\CustomerHardwareController;
use App\Http\Controllers\CustomerHistoryController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HardwareController;
use \Illuminate\Support\Facades\Gate;

// Nafiz start
Route::resource('/billing', BillingController::class);
Route::resource('/payment', PaymentController::class);
Route::resource('/address', CustomerAddressController::class);
Route::resource('/hardware', HardwareController::class);
Route::resource('/customer-hardware', CustomerHardwareController::class);
Route::resource('/history', CustomerHistoryController::class);
// Nafiz End

//Bisnu Start
Route::get('/customers', [CustomersController::class, 'index']);
Route::post('/customer', [CustomersController::class, 'create']);
Route::delete('customer/{id}', [CustomersController::class, 'delete']);
Route::put('customer/{id}', [CustomersController::class, 'customer_update']);

Route::resource('/diposit', \App\Http\Controllers\DipositController::class);

Route::get('/test', function () {
    Gate::authorize('ac', \App\Models\User::class);
    return \App\Models\User::all();
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

//Bisnu End
