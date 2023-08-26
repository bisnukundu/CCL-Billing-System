<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerHistory extends Model
{
    use HasFactory;

    protected $fillable = ["transection_type", "description", "customer_id", "user_id"];

    function customer()
    {
        return $this->belongsTo(Customers::class, 'id');
    }
}
