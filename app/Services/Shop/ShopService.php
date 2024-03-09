<?php

namespace App\Services\Shop;

use App\DTOs\Shop\ShopDTO;
use App\Exceptions\Api\Shop\ShopException;
use App\Models\Shop\Shop;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ShopService
{
    /**
     * Create a shop by user
     * @param ShopDTO $shopDTO
     * @param int $userId
     * @return Shop
     * @throws ShopException
     */
    public function create(ShopDTO $shopDTO, int $userId): Shop
    {
        try {
            return DB::transaction(function () use ($shopDTO, $userId) {
                $shop = Shop::query()->create([
                    'user_id' => $userId,
                    'cemetery_id' => $shopDTO->cemetery_id,
                    'name' => $shopDTO->name,
                    'phone' => $shopDTO->phone,
                    'email' => $shopDTO->email,
                    'description' => $shopDTO->description,
                    'address' => $shopDTO->address,
                    'shop_address_coords' => $shopDTO->shop_address_coords,
                    'cemetery_address' => $shopDTO->cemetery_address,
                    'cemetery_address_coords' => $shopDTO->cemetery_address_coords,
                    'has_pickup' => $shopDTO->has_pickup,
                    'status' => $shopDTO->status
                ]);

                $shop->requisite()->create([
                    'full_name' => $shopDTO->full_name,
                    'legal_address' => $shopDTO->legal_address,
                    'post_address' => $shopDTO->post_address,
                    'INN' => $shopDTO->INN,
                    'OGRN' => $shopDTO->OGRN,
                    'KPP' => $shopDTO->KPP,
                    'BIK' => $shopDTO->BIK,
                    'payment_account' => $shopDTO->payment_account,
                    'correspondent_account' => $shopDTO->correspondent_account,
                    'bank_name' => $shopDTO->bank_name,
                ]);

                return $shop;
            });
        } catch (\Throwable $exception) {
            throw new ShopException($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
