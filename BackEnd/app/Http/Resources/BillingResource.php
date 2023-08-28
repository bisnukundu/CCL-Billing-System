<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"               => $this->id,
            "bill_amount"      => $this->bill_amount,
            "addtional_charge" => $this->addtional_charge,
            "discount"         => $this->discount,
            "vat"              => $this->vat,
            "advance"          => $this->advance,
            "billing_month"    => $this->billing_month,
            "dues"             => $this->dues,
            "customer"      => new CustomerResource($this->customer),
        ];
    }
}
