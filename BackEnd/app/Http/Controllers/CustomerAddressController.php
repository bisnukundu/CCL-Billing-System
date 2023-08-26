<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Validator;

class CustomerAddressController extends Controller
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
        
        $validate = Validator::make(
            $request->all(),
            [
                'house' => 'required',
                'area' => 'required',
                'customerId' => 'required',
            ]
        );

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }
        try {
            $addNewAddress = CustomerAddress::create([
                'house' => $request->house,
                'flat' => $request->flat,
                'road' => $request->road,
                'building_name' => $request->buildingName,
                'area' => $request->area,
                'customer_id' => $request->customerId,
            ]);
            if ($addNewAddress) {
                return response()->json(["data" => $addNewAddress, "message" => 'Success']);
            }else{
                return response()->json(["message" => 'Can not add new data!']);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
            $address = Customers::with(['customer_address' => function ($q) {
                $q->latest('created_at')->take(1);
            }])->where('id', $id)->get();
            if ($address) {
                return response()->json(["data" => $address, "message" => 'Success']);
            } else {
                return response()->json(["message" => 'No data found or invalid input criteria']);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
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
