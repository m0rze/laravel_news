<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function getNewsListByCat($catId)
    {

        $news = $this->getNews();
        $catId = intval($catId);
        foreach ($news as $k => $oneNews) {
            if ($oneNews["catId"] !== $catId) {
                unset($news[$k]);
            }
        }
        $categories = $this->getCategories();
        foreach ($categories as $oneCat) {
            if ($oneCat["id"] === $catId) {
                $needCatKey = $oneCat;
                break;
            }
        }
        return view("pages.news.showbycat", [
            "cat" => $needCatKey,
            "news" => $news
        ]);
    }

    public function showNews($id)
    {
        $news = $this->getNews();
        $needNewsKey = array_search($id, array_column($news, 'id'));
        if ($needNewsKey === false) {
            abort(404);
        }
        $news = $news[$needNewsKey];
        $categories = $this->getCategories();
        foreach ($categories as $oneCat) {
            if ($oneCat["id"] === $news["catId"]) {
                $needCatKey = $oneCat;
                break;
            }
        }
        return view("pages.news.show", [
            "id" => $id,
            "news" => $news,
            "category" => $needCatKey
        ]);
    }
}
