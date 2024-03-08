<?php

namespace App\Http\Controllers\Api\v1\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\ProductCategoryCollection;
use App\Models\Shop\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'categories' => new ProductCategoryCollection(ProductCategory::latest()->paginate(15))
        ])->setStatusCode(Response::HTTP_OK);
    }
}
