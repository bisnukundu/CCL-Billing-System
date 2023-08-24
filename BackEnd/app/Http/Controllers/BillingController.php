<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Customers;
use App\Models\Payment;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billingHistory = Customers::with('billings.payments.user')->get();
        // $customer = Billing::with('customer')->get();
        // $customer = Payment::with('user','billing.customer')->get();
        // $bills = Customers::all();

        return response()->json($billingHistory);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
