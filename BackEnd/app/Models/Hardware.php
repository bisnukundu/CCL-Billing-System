<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;

    protected $fillable = ["stb_id", "stb_type", "customer_id"];

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
