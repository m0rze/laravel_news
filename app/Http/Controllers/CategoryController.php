<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function showCatsList()
    {
        return view("Category/cats-list", [
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
        return view("Category/category", [
            "id" => $id,
            "category" => $categories[$needCatKey]
        ]);
    }
}
