<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = ["name", "mobile", "customer_type", "monthly_bill", "additional_charge", "discount", "advance", "active", "connection_date", "bill_genarate_status", "note", "bill_collector", "number_of_connection"];
    //Bisnu Start
    function customer_address()
    {
        return $this->hasMany(CustomerAddress::class, 'customer_id');
    }

    function customer_history()
    {
        return $this->hasMany(CustomerHistory::class, 'customer_id');
    }
    //Bisnu End
    // Nafiz Start
    public function billings()
    {
        return $this->hasMany(Billing::class, 'customer_id');
    }
    // get last bill for payment
    // public function lastBill()
    // {
    //     return $this->hasMany(Billing::class, 'customer_id');
    // }
    public function hardware()
    {
        return $this->hasMany(Hardeware::class, 'customer_id');
    }
    // Nafiz End
    public function diposit()
    {
        return $this->Hasmany(Diposit::class, 'customer_id');
    }
}
