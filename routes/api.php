<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\productController;

Route::get("product", [productController::class, 'findAll']);

Route::get("product/{id}", [productController::class, 'findOne']);

Route::post("product", [productController::class, 'create']);

Route::put("product/{id}", [productController::class, 'update']);

Route::patch("product/{id}", [productController::class, 'partialUpdate']);

Route::delete("product/{id}", [productController::class, 'delete']);