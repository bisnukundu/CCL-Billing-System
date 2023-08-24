<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Nafiz start
Route::resource('/billing-history', BillingController::class);
Route::resource('/payment', PaymentController::class);
// Nafiz End
