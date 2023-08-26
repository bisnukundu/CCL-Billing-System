<?php

namespace App\Http\Controllers;

use App\Models\CustomerHistory;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            $customerHistory = Customers::with('customer_history')->where('id', $id)->get();
            if ($customerHistory) {
                return response()->json(['data' => $customerHistory, 'message' => 'Success'], 200);
            } else {
                return response()->json(['message' => 'Data not found or invalid id'], 404);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
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
