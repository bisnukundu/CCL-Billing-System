<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allHardware = Hardware::all();
        return response()->json(['message' => 'Success', 'data' => $allHardware]);
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
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'stbId' => 'required|min:10',
                'stbType' => 'required|string'
            ]
        );

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }
        try {
            $newHardware = Hardware::create([
                'stb_id' => $request->stbId,
                'stb_type' => $request->stbType,
                'customer_id' => $request->customerId,
            ]);
            if ($newHardware) {
                return response()->json(['message' => 'New Hardware added!', "data" => $newHardware]);
            } else {
                return response()->json(["message" => 'Something went wrong!']);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $showHardware = Hardware::find($id);
            if ($showHardware) {

                return response()->json(['message' => 'Hardware has been deleted!', "data" => $showHardware]);
            } else {
                return response()->json(["message" => 'No data found or invalid input criteria']);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'stbId' => 'required|min:10',
                'stbType' => 'required|string'
            ]
        );

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        try {
            $updateHardware = Hardware::find($id);
            if ($updateHardware) {

                $updateHardware->stb_id = $request->stbId;
                $updateHardware->stb_type = $request->stbType;
                $updateHardware->save();

                return response()->json(['message' => 'Hardware Successfully Updated!'], 200);
            } else {
                return response()->json(['message' => 'Error', 'data' => 'No data Found or Invalid Id']);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $hardware = Hardware::find($id);
            if ($hardware) {
                $hardware->delete();

                return response()->json(['message' => 'Hardware has been deleted!']);
            } else {
                return response()->json(["message" => 'No data found or invalid input criteria']);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
}
