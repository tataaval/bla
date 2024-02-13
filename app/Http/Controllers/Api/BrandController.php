<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function getBrands()
    {
        $brands = Brand::all(['id', 'brand']);
        $data = [
            'status' => 200,
            'brands' => $brands
        ];
        return response()->json($data, 200);
    }
}
