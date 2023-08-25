<?php

namespace App\Http\Controllers;

use App\Models\Customers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    protected $validate_input_arr = [
        'name' => 'required|string|max:100',
        'mobile' => 'required|string|max:14',
        'customer_type' => 'required|string',
        'monthly_bill' => 'required|numeric',
        'additional_charge' => 'required|numeric',
        'discount' => 'required|numeric',
        'active' => 'required|boolean',
        'connection_date' => 'nullable|date',
        'note' => 'nullable|string',
        'bill_collector' => 'nullable|string',
        'number_of_connection' => 'nullable|integer'
    ];

    //    Get all customers
    function index()
    {
//        $total_diposit = Customers::all()->diposit()->sum('add_deposit');
//        return $total_diposit;
        return response()->json(['data' => Customers::with(['customer_address' => function ($query) {
            $query->latest()->limit(1);
        }])->withCount(['diposit as deposit' => function ($query) {
            $query->select(DB::raw('sum(add_deposit) - sum(return_deposit)'));
        }])->get(), 'message' => "All Customers Get Successfully"]);
    }

    //    Create new Customer
    function create(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validate_input_arr);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $new_customer = Customers::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'customer_type' => $request->customer_type,
                'monthly_bill' => $request->monthly_bill,
                'additional_charge' => $request->additional_charge,
                'discount' => $request->discount,
                'active' => $request->active,
                'connection_date' => $request->connection_date,
                'note' => $request->note,
                'bill_collector' => $request->bill_collector,
                'number_of_connection' => $request->number_of_connection
            ]);

            return response()->json(['data' => $new_customer, 'message' => "Customer Created Successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    function delete($id)
    {
        try {
            $customer = Customers::find($id);
            if ($customer) {
                $customer->delete();
                return response()->json(['data' => [], 'message' => 'Customer Delete Success']);
            } else {
                return response()->json(['data' => [], 'message' => "Sorry we didn't find customer"]);
            }
        } catch (\Exception $error) {
            return response()->json(['data' => [], 'message' => $error->getMessage()], 500);
        }
    }

    function customer_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->validate_input_arr);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        try {
            $new_customer = Customers::find($id);

            $new_customer->update([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'customer_type' => $request->customer_type,
                'monthly_bill' => $request->monthly_bill,
                'additional_charge' => $request->additional_charge,
                'discount' => $request->discount,
                'active' => $request->active,
                'connection_date' => $request->connection_date,
                'note' => $request->note,
                'bill_collector' => $request->bill_collector,
                'number_of_connection' => $request->number_of_connection
            ]);
            $new_customer->refresh();
            return response()->json(['data' => $new_customer, 'message' => "Customer Created Successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
