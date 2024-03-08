<?php

namespace App\Http\Controllers\Api\v1\Shop;

use App\DTOs\Shop\ProductDTO;
use App\Exceptions\Api\Shop\ProductException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Shop\ProductRequest;
use App\Services\Shop\ProductService;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class ProductController extends Controller
{
    public function __construct(readonly ProductService $productService)
    {
    }

    public function index()
    {

    }

    /**
     * @throws CastTargetException|ProductException|MissingCastTypeException
     */
    public function store(ProductRequest $request)
    {
        $product = $this->productService->create(
            ProductDTO::fromArray($request->validated()),
        );

        // TODO
    }
}
