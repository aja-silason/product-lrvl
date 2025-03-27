<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    function getAll(){

        $products = Product::all();;

        if($products->isEmpty()){
            return response()->json(['message' => 'product list is empty', 'data' => []], 200);
        }

        return response()->json($products, 200);
    }
}
