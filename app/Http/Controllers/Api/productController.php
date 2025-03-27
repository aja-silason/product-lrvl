<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Validator;


class productController extends Controller
{
    public function findAll(){

        $products = Product::all();

        if($products->isEmpty()){
            $data = [
                'data' => $products,
                'message' => 'product is empty',
                'status'=> 200
            ];

            return response()->json($data, 200);
        }


        return response()->json($products, 200);
    }

    public function create(Request $request){

        $isValidate = Validator::make($request->all(), [
            'product' => 'required:100',
            'price' => 'required | integer',
            'description' => 'required',
        ]);

        if($isValidate->fails()){
            $data = [
                'message' => 'validation require, check the datas',
                'error' => $isValidate->errors(),
                'status' => 400,
            ];

            return response()->json($data, 400);
        }

        $product = Product::create([
            'product' => $request->product,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        if(!$request){
            $data = [
                'message' => 'not be possible create product ',
                'error' => $isValidate->errors(),
                'status' => 400,
            ];

            return response()->json($data, 400);
        }

        response()->json(201);
    } 

    public function findOne($id){

        $product = Product::find($id);

        if(!$product) {
            $data = [
                'message' => 'product not found',
                'status' => 404,
            ];

            return response()->json($data, 404);
        }
        return response()->json($product, 200);
    }

    public function update($id){

        $product = Product::find($id);

        if(!$product){
            $data = [
                'message' => 'product not found',
                'status' => 404
            ];

            return response()->json($product, 404);
        }

        return response()->json($product, 201);

    }
}
