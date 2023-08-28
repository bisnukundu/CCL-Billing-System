<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $nid
 * @property mixed $role
 * @property mixed $mobile
 * @property mixed $email
 * @property mixed $name
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"     => $this->id,
            "name"   => $this->name,
            "email"  => $this->email,
            "mobile" => $this->mobile,
            "role"   => $this->role,
            "nid"    => $this->nid,
        ];
    }
}
