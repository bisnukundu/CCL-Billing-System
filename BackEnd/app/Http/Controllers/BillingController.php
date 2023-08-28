<?php

namespace App\Http\Controllers;

use App\Http\Resources\BillingResource;
use App\Models\Billing;
use App\Models\Customers;
use App\Models\Payment;
use Illuminate\Http\Request;
use Exception;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $billings = Billing::with('customer')->latest()->get();
            return BillingResource::collection($billings);
        }catch (Exception $e){
            return response()->json(['data' => [], 'message' => $e->getMessage()], 500);
        }
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
