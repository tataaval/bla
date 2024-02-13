<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::get('students/{id}/edit', [StudentController::class, 'edit']);
Route::put('students/{id}/edit', [StudentController::class, 'update']);

//Categories
Route::get('categories', [CategoryController::class, 'getCategories']);
//Brands
Route::get('brands', [BrandController::class, 'getBrands']);

//Products
Route::get('products', [ProductController::class, 'getProducts']);
Route::post('products', [ProductController::class, 'addProduct']);
Route::put('products/{id}', [ProductController::class, 'updateProduct']);

//product Images
Route::get('images', [ImageController::class, 'getProductImages']);
Route::post('images', [ImageController::class, 'addProductImages']);
