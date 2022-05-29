<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Queries\QueryBuilderNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(QueryBuilderNews $news)
    {
        $news = $news->getNews();

        return view("admin.news.show", [
            "news" => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.news.create", [
            "categories" => Category::all(["id", "title"])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->only(["title", "description", "body", "category_id", "author", "status"]);
        $validated["slug"] = Str::slug($validated["title"]);
        $validated["source_id"] = 1;

        if(News::create($validated)->save()) {
            return redirect()
                ->route("admin.news.index")
                ->with("success", "Новость успешно добавлена");
        }

        return back()->withInput()->with('error', 'Ошибка добавления');
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
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id, QueryBuilderNews $news)
    {
        $news = $news->getNewsById($id);
        return view("admin.news.edit", [
            "news" => $news,
            "categories" => Category::all(["id", "title"])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->only([
            "title", "description", "body", "category_id", "author", "status"
        ]);
        $validated["slug"] = Str::slug($validated["title"]);
        $validated["source_id"] = 1;
        $news->fill($validated);
        if($news->save()) {
            return redirect()
                ->route("admin.news.index")
                ->with("success", "Новость успешно обновлена");
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
        if(News::destroy([$id])){
            return json_encode([
                "result" => true
            ]);
        }
        return json_encode([
            "result" => false
        ]);
    }
}
