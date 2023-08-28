<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $updated_at
 * @property mixed $created_at
 * @property mixed $customer_id
 * @property mixed $stb_type
 * @property mixed $stb_id
 * @property mixed $id
 * @property mixed $customer
 */
class HardwareResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return [
        "id"            => $this->id,
        "stb_id"        => $this->stb_id,
        "stb_type"      => $this->stb_type,
        "customer"      => new CustomerResource($this->customer),
        "created_at"    => $this->created_at,
        "updated_at"    => $this->updated_at
      ];
    }
}
