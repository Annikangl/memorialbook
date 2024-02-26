<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'shop_product_categories';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
