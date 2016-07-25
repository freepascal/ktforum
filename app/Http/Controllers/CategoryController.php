<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Log;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(array('categories' => Category::all()));
    }

    public function subcategories($parent_id = null)
    {
        if ($parent_id == null) {
            return response()->json([
                'categories' => Category::with('parent')->with('subcategories')->where('parent_id', '=', null)->get()
            ]);
        }
        return response()->json([
            'categories' => Category::with('parent')->with('subcategories')->where('parent_id', '=', $parent_id)->get()
        ]);
    }

    public function show($slug)
    {
        $category = Category::with('parent')->with('subcategories')->where('slug', '=', $slug)->first();
        if (!$category) {
            $category = Category::with('parent')->with('subcategories')->where('id', '=', $slug)->first();
        }
        return response()->json(array(
            'category'  => $category
        ));
    }
}
