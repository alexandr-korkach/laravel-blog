<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $articles = $category->articles()->allPaginate();
        return view('content.by-category', compact('articles', 'category'));
    }

    public function allByAuthor($id){
        $author = User::query()->findOrFail($id);

        $articles = $author->articles()->allPaginate();

        return view('content.by-author', compact('articles', 'author'));
    }

    public function allByDate($date){


        $articles = Article::query()->allByDatePaginate($date);

        $date = Carbon::parse($date)->locale('uk');
        $date = Str::ucfirst($date->translatedFormat('M d, Y'));

        return view('content.by-date', compact('articles', 'date'));
    }

}
