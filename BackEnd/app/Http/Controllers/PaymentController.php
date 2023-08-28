<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\BillingResource;
use App\Http\Resources\PaymentResource;
use App\Models\Billing;
use App\Models\CustomerHistory;
use App\Models\Customers;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    use ResponseHelper;

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
    public function store(PaymentRequest $request)
    {

        $request->validated();

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
                'customer_id' => 1, // It will be dynamic
                'user_id' => 1, // It will be dynamic
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
        try {
            $payments = Payment::with(['billing.customer', 'user'])->where('id', $id)->firstOrFail();
            return new PaymentResource($payments);
        } catch (\Exception $err) {
            return $this->response_helper($err->getMessage());
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
    public function update(PaymentRequest $request, string $id)
    {

        $request->validated();

        try {
            $updatePayment = Payment::find($id);
            if ($updatePayment) {
                $updatePayment->collection_amount = $request->paymentAmount;
                $updatePayment->collection_type = $request->paymentType;
                $updatePayment->save();
                return new PaymentResource($updatePayment);
            } else {
                return $this->response_helper('No data Found or Invalid Id');
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
            $deletePayment = Payment::findOrFail($id);
            $deletePayment->delete();
            return $this->response_helper('Payment has been deleted!');
        } catch (Exception $e) {
            return $this->response_helper($e->getMessage());
        }
    }
}
