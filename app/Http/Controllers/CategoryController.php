<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Log;
use DB;

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

    public function breadcrumb($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        if (!$category) {
            $category = Category::where('id', '=', $slug)->first();
        }
        // query builder
        $PATTERN_SELECT = "t%d.title AS title%d, t%d.slug AS slug%d, ";
        $PATTERN_JOIN = "INNER JOIN categories AS t%d ON t%d.parent_id = t%d.id ";
        $select = " ";
        $join = " ";
        for($i = 1; $i <= $category->depth + 1; ++$i) {
            $select .= sprintf($PATTERN_SELECT, $i, $i, $i, $i);
        }
        for($i = 1; $i <= $category->depth; ++$i) {
            $join .= sprintf($PATTERN_JOIN, $i+1, $i, $i+1);
        }
        $query = "SELECT". substr($select, 0, strlen($select)-2). " "
            ."FROM categories as t1"
            .$join
            ."WHERE t1.id = ". $category->id;
        $result = DB::select(DB::raw($query));
        return response()->json(['breadcrumb' => $result]);
    }

    public function show($slug)
    {
        $category = Category::with('subcategories')->with('topics')->where('slug', '=', $slug)->first();
        if (!$category) {
            $category = Category::with('subcategories')->with('topics')->where('id', '=', $slug)->first();
        }
        return response()->json(array(
            'category'  => $category
        ));
    }
}
