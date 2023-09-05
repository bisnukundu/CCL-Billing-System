<?php

namespace App\Helpers;

use App\Models\CustomerHistory;


trait ResponseHelper
{
    function response_helper(string $msg, $status = 500)
    {
        return response()->json(['data' => [], 'message' => $msg], $status);
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

