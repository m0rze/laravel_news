<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function getNewsList($catId = "") {

        $news = $this->getNews();
        if(!empty($catId)) {
            $catId = intval($catId);
            foreach ($news as $k=>$oneNews){
                if($oneNews["catId"] !== $catId){
                    unset($news[$k]);
                }
            }
        }
        return view("News/news-list", [
            "catId" => $catId,
            "news" => $news
        ]);
    }

    public function showNews($id)
    {
        $news = $this->getNews();
        $needNewsKey = array_search($id, array_column($news, 'id'));
        if($needNewsKey === false){
            abort(404);
        }
        return view("News/news", [
            "id" => $id,
            "news" => $news[$needNewsKey]
        ]);
    }
}
