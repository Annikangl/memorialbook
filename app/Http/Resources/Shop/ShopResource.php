<?php

namespace App\Http\Resources\Shop;

use App\Models\Shop\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Shop */
class ShopResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'cemetery_id' => $this->cemetery_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'shop_address_coords' => $this->shop_address_coords,
            'cemetery_address' => $this->cemetery_address,
            'cemetery_address_coords' => $this->cemetery_address_coords,
            'description' => $this->description,
            'status' => $this->status,
            'has_pickup' => $this->has_pickup,
            'created_at' => $this->created_at->format('d.m.Y'),
            'shop_requisite' => new ShopRequisiteResource($this->whenLoaded('requisite')),
        ];
    }
}
