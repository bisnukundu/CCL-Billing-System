<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    //Bisnu Start
    function customer_address()
    {
        return $this->hasMany(Customer_address::class, 'customer_id');
    }

    function customer_history()
    {
        return $this->hasMany(Customer_history::class, 'customer_id');
    }
    //Bisnu End
    public function billings()
    {
        $this->hasMany(Billing::class, 'customer_id');
    }
    public function diposit()
    {
        return $this->Hasmany(Diposit::class, 'customer_id');
    }
}
