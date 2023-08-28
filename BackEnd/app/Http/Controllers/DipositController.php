<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepositResource;
use App\Models\Customers;
use App\Models\Diposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class DipositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        $deposit = Customers::find($id)->diposit()->with(['user', 'customer'])->get();

        return DepositResource::collection($deposit);
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
        $validator = Validator::make($request->all(), [
            "add_deposit" => 'required|numeric',
            "return_deposit" => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        try {
            $diposit = Diposit::findOrFail($id);
            $diposit->add_deposit = $request->add_deposit;
            $diposit->return_deposit = $request->return_deposit;
            $diposit->save();
            return response()->json(['data' => $diposit, 'message' => 'Deposit Update Successfully'], 200);
        } catch (\Exception $exception) {
            return response()->json(['data' => [], 'message' => $exception->getMessage()], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
