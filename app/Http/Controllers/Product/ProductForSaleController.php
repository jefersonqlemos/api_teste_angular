<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductForSaleController extends Controller
{
    //
    public function index()
    {
        //
        $products = Product::orderBy('id')->get();

        return response()->json([
            'products' => $products
        ]);
    }
}
