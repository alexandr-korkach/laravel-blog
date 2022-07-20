<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $articles = Article::allPaginate(1);
        return view('blog', compact('articles'));
    }
}
