<?php

namespace App\Helpers;


trait ResponseHelper
{
    function response_helper(string $msg, $status = 500)
    {
        return response()->json(['data' => [], 'message' => $msg], $status);
    }
}

