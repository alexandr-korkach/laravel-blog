<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $articles = Article::allPaginate(6);
        return view('content.blog', compact('articles'));
    }

    public function show($slug){

        $article = Article::findBySlug($slug);
        return view('content.blog-show', compact('article'));
    }
}
