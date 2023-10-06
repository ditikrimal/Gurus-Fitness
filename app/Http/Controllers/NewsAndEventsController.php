<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsAndEventsController extends Controller
{
    
    public function newsEvents()
    {
        return view('navlinks.newsAndEvents',[
            'news' =>News::orderBy('created_at', 'desc')->paginate(4),
            'most_viewed_news'=>News::orderBy('news_views', 'desc')->paginate(6)
        ]);
    }
    public function showSingleNews(News $news_id){
        $news_id->increment('news_views');
        return view('navlinks.news.single_news',[
            'news'=>$news_id
        ]);
    }
}
