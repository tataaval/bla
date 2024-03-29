<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'seller_id',
        'category_id',
        'brand_id',
        'price',
        'new_price',
        'in_stock',
        'on_sale',
        'description'
    ];
}
