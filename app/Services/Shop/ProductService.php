<?php

namespace App\Services\Shop;

use App\DTOs\Shop\ProductDTO;
use App\Exceptions\Api\Shop\ProductException;
use App\Models\Shop\Product;
use App\Models\Shop\ProductCategory;
use App\Models\Shop\Shop;
use App\Models\User\User;
use Illuminate\Http\Response;

class ProductService
{
    /**
     * Create product in shop
     * @param ProductDTO $productDTO
     * @param User $user
     * @return Product
     * @throws ProductException
     */
    public function create(ProductDTO $productDTO): Product
    {
        try {
            $shop = $this->getShop($productDTO->shop_id);
            $productCategory = $this->getProductCategory($productDTO->category_id);

            $product = Product::query()->make([
                'name' => $productDTO->name,
                'description' => $productDTO->description,
                'price' => $productDTO->price
            ]);

            $product->shop()->associate($shop);
            $product->category()->associate($productCategory);

            $product->save();

            return $product;
        } catch (\Throwable $throwable) {
            throw new ProductException($throwable->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function getShop(int $shopId): Shop
    {
        return Shop::query()->findOrFail($shopId);
    }

    private function getProductCategory(int $productCategoryId): ProductCategory
    {
        return ProductCategory::query()->findOrFail($productCategoryId);
    }
}
