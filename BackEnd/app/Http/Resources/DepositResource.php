<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $user_id
 * @property mixed $return_deposit
 * @property mixed $add_deposit
 * @property mixed $customer_id
 * @property mixed $id
 * @property mixed $user
 * @property mixed $customer
 */
class DepositResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"                => $this->id,
            "customer_id"       => $this->customer_id,
            "add_deposit"       => $this->add_deposit,
            "return_deposit"    => $this->return_deposit,
            "user"              => new UserResource($this->user),
            "customer"          => new CustomerResource($this->customer),
        ];
    }
}
