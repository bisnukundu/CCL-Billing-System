<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Models\CustomerHistory;
use App\Models\Customers;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
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
        // billingId (will get bill), UserId (session or cookies), paymentAmount (direct)
        $rules = [
            'paymentAmount' => 'required|numeric|min:10',
            'paymentType' => 'required|string'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        try {
            $data = Payment::create([
                "collection_amount" => $request->paymentAmount,
                "collection_type" => $request->paymentType,
                "user_id" => $request->userId,
                "billing_id" => $request->billId,
            ]);
            CustomerHistory::create([
                'transection_type' => 'New Payment',
                'description' => $request->paymentAmount . ' New Payment Received!',
                'customer_id' => 1,
                'user_id' => 1,
            ]);
            return response()->json(['message' => 'success', 'data' => $data], 200);
            
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $billAndPayment = Customers::with(['billings' => function ($q) {
            $q->latest('created_at')->take(1);
        }, 'billings.payments.user'])->where('id', $id)->get();

        if ($billAndPayment->count() > 0) {
            return response()->json(["message" => 'Success', "data" => $billAndPayment]);
            // return PaymentResource::collection($billAndPayment);
        } else {
            return response()->json(['message' => 'Error', 'data' => 'No data Found or Invalid Id']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editPayment = Customers::with(['billings' => function ($q) {
            $q->latest('created_at')->take(1);
        }, 'billings.payments.user'])->where('id', $id)->get();

        if ($editPayment->count() > 0) {
            return response()->json(["message" => 'Success', "data" => $editPayment]);
        } else {
            return response()->json(['message' => 'Error', 'data' => 'No data Found or Invalid Id']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate = Validator::make(
            $request->all(),
            [
                'paymentAmount' => 'required|numeric|min:10',
                'paymentType' => 'required|string'
            ]
        );

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        try {
            $updatePayment = Payment::find($id);
            if ($updatePayment) {

                $updatePayment->collection_amount = $request->paymentAmount;
                $updatePayment->collection_type = $request->paymentType;
                $updatePayment->save();

                return response()->json(['message' => 'Payment Successfully Updated!'], 200);
            } else {
                return response()->json(['message' => 'Error', 'data' => 'No data Found or Invalid Id']);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deletePayment = Payment::find($id);
            if ($deletePayment) {

                $deletePayment->delete();
                return response()->json(['message' => 'Payment has been deleted!'], 200);
            } else {
                return response()->json(['message' => 'Error', 'data' => 'No data Found or Invalid Id']);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
}
