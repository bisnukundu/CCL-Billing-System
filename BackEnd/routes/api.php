<?php

use App\Http\Controllers\BillingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;

Route::resource('/billing-history', BillingController::class);

//Bisnu Start
Route::get('/customers', [CustomersController::class, 'index']);
Route::post('/customer', [CustomersController::class, 'create']);
Route::delete('customer/{id}', [CustomersController::class, 'delete']);
Route::put('customer/{id}', [CustomersController::class, 'customer_update']);
//Bisnu End
