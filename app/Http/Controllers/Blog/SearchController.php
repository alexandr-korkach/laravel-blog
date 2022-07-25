<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\Blog\SearchRequest;

class SearchController extends Controller
{
    public function searchArticle(SearchRequest $request){

        $string = $request->q;
        $articles = Article::searchByTitle($string);
        return view('content.search', compact('articles'));
    }
}
