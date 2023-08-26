<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HardwareController;

// Nafiz start
Route::resource('/billing-history', BillingController::class);
Route::resource('/payment', PaymentController::class);
Route::resource('/address', CustomerAddressController::class);
Route::resource('/hardware', HardwareController::class);
// Nafiz End

//Bisnu Start
Route::get('/customers', [CustomersController::class, 'index']);
Route::post('/customer', [CustomersController::class, 'create']);
Route::delete('customer/{id}', [CustomersController::class, 'delete']);
Route::put('customer/{id}', [CustomersController::class, 'customer_update']);

Route::resource('/diposit', \App\Http\Controllers\DipositController::class);
//Bisnu End
