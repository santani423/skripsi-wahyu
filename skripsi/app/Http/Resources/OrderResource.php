<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'service' => $this->resource->service,
            'orderDate' => $this->resource->order_date,
            'phoneNumber' => $this->resource->phone_number,
            'address' => $this->resource->address,
            'user' => $this->resource->user,
            'orderStatus' => $this->resource->order_status,
            'timelineValue' => $this->resource->timeline_value
        ];
    }
}
