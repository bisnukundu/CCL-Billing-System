<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ["collection_amount","collection_type","user_id","billing_id"];

    public function billing()
    {
        $this->belongsTo(Billing::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
