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
            'collection_amount' => $this->collection_amount,
            'collection_type' => $this->collection_type,
            'user_id' => $this->user_id,
            'billing_id' => $this->billing_id,
            'user' => $this->user,
            'billing' => new BillingResource($this->billing)
        ];
    }
}
