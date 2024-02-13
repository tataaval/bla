<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //TODO
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Product::create([
                'product_name' => $request->product_name,
                'seller_id' => $request->seller_id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                'new_price' => $request->new_price,
                'in_stock' => $request->in_stock,
                'on_sale' => $request->on_sale,
                'description' => $request->description
            ]);

            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Product added successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'something went wrong'
                ], 500);
            }
        }
    }

    public function getProducts(Request $request)
    {
        $func = function (string $key, $req) {
            return [$key, '=', $req->query($key)];
        };

        $whereCondition = array_map(function ($value) use ($request, $func) {
            return $func($value, $request);
        }, $request->keys());
        // print_r($whereCondition);
        $products = DB::table('products')
            ->join('users', 'products.seller_id', '=', 'users.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'users.user_name', 'brands.brand', 'categories.category')
            ->where($whereCondition)
            ->get()->toArray();

        $generateImagesArray = function ($elem) {
            $images = DB::table('images')->where('product_id', $elem->id)->select('image_link', 'id')->get();
            $elem->images = $images;
            return $elem;
        };

        $productsWithImages = array_map($generateImagesArray, $products);
        $data = [
            'status' => 200,
            'products' => $productsWithImages
        ];
        return response()->json($data, 200);
    }



    public function updateProduct(Request $request, int $id)
    {
        // $products = Product::all([
        //     'product_name',
        //     'seller_id',
        //     'category_id',
        //     'brand_id',
        //     'price',
        //     'new_price',
        //     'in_stock',
        //     'on_sale',
        //     'description'
        // ]);

        $product = Product::find($id);
        if ($product) {
            $product->update([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'new_price' => $request->new_price,
                'in_stock' => $request->in_stock,
                'on_sale' => $request->on_sale,
                'description' => $request->description
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'product updated successfully'
            ], 200);
        }
    }
}
