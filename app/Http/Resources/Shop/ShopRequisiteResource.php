<?php

namespace App\Http\Resources\Shop;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Shop\ShopRequisite */
class ShopRequisiteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shop_id' => $this->shop_id,
            'full_name' => $this->full_name,
            'legal_address' => $this->legal_address,
            'post_address' => $this->post_address,
            'INN' => $this->INN,
            'OGRN' => $this->OGRN,
            'KPP' => $this->KPP,
            'BIK' => $this->BIK,
            'payment_account' => $this->payment_account,
            'correspondent_account' => $this->correspondent_account,
            'bank_name' => $this->bank_name,
        ];
    }
}
