<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_history extends Model
{
    use HasFactory;

    function customer()
    {
        return $this->belongsTo(Customers::class, 'id');
    }
}
