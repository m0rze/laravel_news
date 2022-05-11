<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function showCatsList()
    {
        return view("pages.category.showlist", [
            "cats" => $this->getCategories()
        ]);
    }

    public function showCategory($id)
    {
        $categories = $this->getCategories();
        $needCatKey = array_search($id, array_column($categories, 'id'));
        if($needCatKey === false){
            abort(404);
        }
        return view("pages.category.showone", [
            "id" => $id,
            "cat" => $categories[$needCatKey]
        ]);
    }
}
