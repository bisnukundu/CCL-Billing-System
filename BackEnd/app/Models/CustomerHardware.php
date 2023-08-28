<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerHardware extends Model
{
    use HasFactory;
    protected $fillable = ['stb_type', 'customer_id', 'hardware_id'];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function hardware()
    {
        return $this->belongsTo(Hardware::class, 'hardware_id');
    }
}
