<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\productController;

Route::get("product", [productController::class, 'findAll']);

Route::post("product", [productController::class, 'create']);

Route::get("product/{id}", [productController::class, 'findOne']);

Route::put("product/{id}", function(){
    return "Updating products";
});

Route::delete("product/{id}", function(){
    return "Delete product";
});

Route::patch("product/{id}", function(){
    return "Updating product";
});