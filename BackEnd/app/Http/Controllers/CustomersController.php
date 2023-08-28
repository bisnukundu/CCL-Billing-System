<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customers;
use App\Helpers\ResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    use ResponseHelper;


    //    Get all customers
    function index()
    {
        $customers = Customers::with(['customer_address' => function ($query) {
            $query->latest()->limit(1);
        }])->withCount(['diposit as deposit' => function ($query) {
            $query->select(DB::raw('sum(add_deposit) - sum(return_deposit)'));
        }])->get();

        return CustomerResource::collection($customers);
    }

    //    Create new Customer
    function create(CustomerRequest $request)
    {
        $request->validated();

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

            $new_customer->customer_address()->create([
                'house' => $request->house,
                'flat' => $request->flat,
                'road' => $request->road,
                'building_name' => $request->buildingName,
                'area' => $request->area,
                'customer_id' => $request->customerId,
            ]);

            return new CustomerResource($new_customer);

        } catch (\Exception $e) {
            return $this->response_helper($e->getMessage());
        }
    }

    function delete($id)
    {
        try {
            $customer = Customers::find($id);
            if ($customer) {
                $customer->delete();
                return $this->response_helper('Customer Delete Success');
            } else {
                return $this->response_helper("Sorry we didn't find customer");
            }
        } catch (\Exception $error) {
            return $this->response_helper($error->getMessage());
        }
    }

    function customer_update(CustomerRequest $request, $id)
    {
        $request->validated();

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
            return new CustomerResource($new_customer);
        } catch (\Exception $e) {
            return $this->response_helper($e->getMessage());
        }
    }
}
