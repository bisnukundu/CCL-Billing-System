<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CustomerAddressResource;

/**
 * @property mixed $customer_address
 * @property mixed $deposit
 * @property mixed $number_of_connection
 * @property mixed $bill_collector
 * @property mixed $note
 * @property mixed $bill_genarate_status
 * @property mixed $connection_date
 * @property mixed $active
 * @property mixed $advance
 * @property mixed $discount
 * @property mixed $additional_charge
 * @property mixed $monthly_bill
 * @property mixed $customer_type
 * @property mixed $mobile
 * @property mixed $name
 * @property mixed $id
 */
class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "mobile" => $this->mobile,
            "customer_type" => $this->customer_type,
            "monthly_bill" => $this->monthly_bill,
            "additional_charge" => $this->additional_charge,
            "discount" => $this->discount,
            "advance" => $this->advance,
            "active" => $this->active,
            "connection_date" => $this->connection_date,
            "bill_genarate_status" => $this->bill_genarate_status,
            "note" => $this->note,
            "bill_collector" => $this->bill_collector,
            "number_of_connection" => $this->number_of_connection,
            "deposit" => $this->deposit,
            "customer_address" => CustomerAddressResource::collection($this->customer_address),
        ];

    }
}
