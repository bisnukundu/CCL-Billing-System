<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'customer_type' => $this->customer_type,
            'monthly_bill' => $this->monthly_bill,
            'additional_charge' => $this->additional_charge,
            'discount' => $this->discount,
            'advance' => $this->advance,
            'active' => $this->active,
            'connection_date' => $this->connection_date,
            'note' => $this->note,
            'bill_collector' => $this->bill_collector,
            'number_of_connection' => $this->number_of_connection,
            'billings' => "" // will come from billing resource,
        ];
    }
}
