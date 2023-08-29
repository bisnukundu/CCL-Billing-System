<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Models\CustomerHistory;
use App\Models\CustomerHardware;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CustomerHardwareRequest;
use App\Http\Resources\CustomerHardwareResource;

class CustomerHardwareController extends Controller
{
    use ResponseHelper;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $allHardware = Hardware::all();
        $allHardware = CustomerHardware::with('customer', 'hardware')->get();
        return CustomerHardwareResource::collection($allHardware);
        // return response()->json(['message' => 'Success', 'data' => $allHardware]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerHardwareRequest $request)
    {
        $request->validated();
        try {
            $newHardware = CustomerHardware::create([
                'stb_type' => $request->stbType,
                'hardware_id' => $request->hardwareId,
                'customer_id' => $request->customerId,
            ]);
            if ($newHardware) {
                // add customer history
                // get user id from session
                $this->addCustomerHistory($request->customerId, 1, 'New Hardware', $request->stbId . ' Hardware assign to customer!');
                return new CustomerHardwareResource($newHardware);
                // return response()->json(['message' => 'New Hardware added!', "data" => $newHardware]);
            } else {
                return response()->json(["message" => 'Something went wrong!']);
            }
        } catch (\Exception $e) {
            return $this->response_helper($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $singleHardware = CustomerHardware::findOrFail($id);
            if ($singleHardware) {

                // return response()->json(['message' => 'Hardware has been deleted!', "data" => $showHardware]);
                return new CustomerHardwareResource($singleHardware);
            } else {
                return response()->json(["message" => 'No data found or invalid input criteria']);
            }
        } catch (\Exception $e) {
            return $this->response_helper($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerHardwareRequest $request, string $id)
    {
        $request->validated();

        try {
            $updateHardware = CustomerHardware::findOrFail($id);
            $hardwareId = Hardware::findOrFail($updateHardware->hardware_id)->stb_id;

            $updateHardware->stb_type = $request->stbType;

            $updateHardware->save();
            //create history
            //user id will be dynamically
            $this->addCustomerHistory($updateHardware->customer_id, 1, 'Hardware Type Modify', $request->stbType . ' Modified as hardeare type!');
            return response()->json(['message' => 'Hardware Successfully Updated!'], 200);
        } catch (\Exception $e) {
            return $this->response_helper($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $hardware = CustomerHardware::findOrFail($id);
            $hardwareId = Hardware::findOrFail($hardware->hardware_id)->stb_id;
            if ($hardware) {
                $hardware->delete();

                // add customer history
                // get user dynamically
                $this->addCustomerHistory($hardware->customer_id, 1, 'Hardware Deleted', $hardwareId . ' Hardware has been deleted!');
                return response()->json(['message' => 'Hardware has been deleted!']);
            } else {
                return response()->json(["message" => 'No data found or invalid input criteria']);
            }
        } catch (\Exception $e) {
            return $this->response_helper($e->getMessage());
        }
    }
    // add customer history
    public function addCustomerHistory($customerId, $userId, $transType, $des)
    {
        CustomerHistory::create([
            'transection_type' => $transType,
            'description' => $des,
            'customer_id' => $customerId,
            'user_id' => $userId, // get user id from session or cookies
        ]);
    }
}
