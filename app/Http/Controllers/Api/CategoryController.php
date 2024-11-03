<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function retrieveCategory() {
        $get_category = Category::orderBy('id')->get();

        $data = [];

        foreach ($get_category as $category) {
            array_push($data, [
                'name' => $category->name,
                'id' => $category->id,
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
