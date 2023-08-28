<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $building_name
 * @property mixed $area
 * @property mixed $road
 * @property mixed $flat
 * @property mixed $id
 */
class CustomerAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'flat'          => $this->flat,
            'road'          => $this->road,
            'area'          => $this->area,
            'building_name' => $this->building_name,
        ];
    }
}
