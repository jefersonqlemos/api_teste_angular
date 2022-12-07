<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCart;

class Product extends Model
{
    use HasFactory;

    public function productCart()
    {
        return $this->hasMany(ProductCart::class);
    }
}
