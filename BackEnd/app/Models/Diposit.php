<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diposit extends Model
{
    use HasFactory;

    function user()
    {
        return $this->belongsTo(User::class, 'id');
    }


    /**
     * Return Customer of this Deposit
     * @return BelongsTo
     */
    function customer(): BelongsTo
    {
        return $this->belongsTo(Customers::class);
    }

}
