<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Log;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(array(
            'categories' => Category::with('parent')->with('subcategories')->with('topics')->where('parent_id', '=', null)->get()
        ));
    }

    public function subcategories($slug_of_parent)
    {
        // check if category exists with slug
        $category = Category::where('slug', '=', $slug_of_parent)->first();
        $category_id = $slug_of_parent;
        if ($category) {
            $category_id = $category->id;
        }
        return response()->json(array(
            'subcategories' => Category::with('parent')->with('subcategories')->with('topics')->where('parent_id', '=', $category_id)->get()
        ));
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
