<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'house',
        'flat',
        'road',
        'building_name',
        'area',
        'customer_id',
    ];

    function customer()
    {
        return $this->belongsTo(Customers::class, 'id');
    }
}
