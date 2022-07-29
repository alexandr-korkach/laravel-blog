<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\SearchRequest;
use App\Models\Article;
use App\Models\MainBanner;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchArticle(SearchRequest $request){

        $q = $request->q;
        $banner = MainBanner::query()->pluck('article_id')->all();
        $articles = Article::searchByTitle($q);
        return view('admin.articles.search', compact('articles', 'q', 'banner'));
    }
}
