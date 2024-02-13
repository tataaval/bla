<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{

    public function addProductImages(Request $request)
    {
        $path = $request->file('file')->storePublicly('products');
        // return response()->json([
        //     'path' => "https://example1app.s3.amazonaws.com/$path",
        //     'msg' => 'success'
        // ]);
        $validator = Validator::make($request->all(), [
            //TODO
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $image = Image::create([
                'product_id' => $request->product_id,
                'image_link' => "https://example1app.s3.amazonaws.com/$path",
            ]);

            if ($image) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Product Image Added Successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'something went wrong'
                ], 500);
            }
        }
    }

    public function getProductImages(Request $request)
    {
        $images = Image::where('product_id', $request->product_id)->get();
        $data = [
            'status' => 200,
            'images' => $images
        ];
        return response()->json($data, 200);
    }
}
