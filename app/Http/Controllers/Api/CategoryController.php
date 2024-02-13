<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getCategories()
    {
        $categories = Category::all(['id', 'category']);
        $data = [
            'status' => 200,
            'categories' => $categories
        ];
        return response()->json($data, 200);
    }
}
