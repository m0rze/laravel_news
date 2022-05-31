<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Queries\QueryBuilderCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(QueryBuilderCategories $categories)
    {
        $categories = $categories->getCategories();
        return view("admin.category.show", [
            "cats" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->only(["title", "description"]);
        $validated["slug"] = Str::slug($validated["title"]);

        if(Category::create($validated)->save()) {
            return redirect()
                ->route("admin.categories.index")
                ->with("success", "Категория успешно добавлена");
        }

        return back()->with('error', 'Ошибка добавления');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view("admin.category.edit", [
            "currentCat" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->only(["title", "description"]);
        $validated["slug"] = Str::slug($validated["title"]);
        $category->fill($validated);
        if($category->save()) {
            return redirect()
                ->route("admin.categories.index")
                ->with("success", "Категория успешно обновлена");
        }

        return back()->with('error', 'Ошибка обновления');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return false|string
     */
    public function destroy($id)
    {
        if(Category::destroy([$id])){
            return json_encode([
                "result" => true
            ]);
        }
        return json_encode([
            "result" => false
        ]);
    }
}
