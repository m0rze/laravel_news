<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function showCatsList()
    {
        $categories = DB::table("categories")
            ->select("id", "name")
            ->get();
        return view("pages.category.showlist", [
            "cats" => $categories
        ]);
    }

    public function showCategory($id)
    {
        $category = DB::table("categories")
            ->where("id", "=", $id)
            ->get();
        if(!empty($category[0])){
            $category = $category[0];
        }
        return view("pages.category.showone", [
            "cat" => $category
        ]);
    }
}
