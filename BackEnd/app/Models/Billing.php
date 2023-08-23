<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = ["bill_amount", "addtional_charge",     "discount","vat ","advance", "billing_month","dues",     "customer_id"];

    public function payments()
    {
        return $this->hasMany(Payment::class,'billing_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
