<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerHardwareResource extends JsonResource
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
            'stb_type' => $this->stb_type,
            'customer_id' => $this->customer_id,
            'hardware_id' => $this->hardware_id,
            'created_at' => $this->created_at,
            'customer' => new CustomerResource($this->customer),
            'hardware' => $this->whenNotNull(HardwareResource::collection($this->hardware))
        ];
    }
}
