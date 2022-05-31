<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function getNewsListByCat($catId)
    {
        $catData = DB::table("categories")
            ->select("id", "name")
            ->where("id", "=", $catId)
            ->get();
        if (count($catData) > 0) {
            $catData = $catData[0];
        } else {
            $catData = null;
        }
        $news = DB::table("news")
            ->select("news.*")
            ->where("news.category_id", "=", $catId)
            ->get();

        return view("pages.news.showbycat", [
            "catData" => $catData,
            "news" => $news
        ]);
    }

    public function showNews($id)
    {
        $news = DB::table("news")
            ->select("news.*", "categories.id", "categories.name as category_name")
            ->join("categories", "news.category_id", "=", "categories.id")
            ->where("news.id", "=", $id)
            ->get();
        if (count($news) > 0) {
            $news = $news[0];
        } else {
            $news = [];
        }

        return view("pages.news.show", [
            "news" => $news
        ]);
    }
}
