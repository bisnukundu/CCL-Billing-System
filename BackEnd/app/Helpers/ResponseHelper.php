<?php

namespace App\Helpers;


trait ResponseHelper
{
    function response_helper(string $msg)
    {
        return response()->json(['data' => [], 'message' => $msg]);
    }
}

