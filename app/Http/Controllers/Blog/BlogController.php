<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $articles = Article::allPaginate();
        return view('content.blog', compact('articles'));
    }

    public function show($slug){

        $article = Article::findBySlug($slug);
        return view('content.blog-show', compact('article'));
    }
    public function allByTag($slug){

        $tag = Tag::findBySlug($slug);
        $articles = $tag->articles()->allPaginate();
        return view('content.by-tag', compact('articles', 'tag'));
    }

    public function allByCategory($slug){

        $category = Category::findBySlug($slug);
        $articles = $category->articles()->allPaginateByCategory();
        return view('content.by-category', compact('articles', 'category'));
    }
}
