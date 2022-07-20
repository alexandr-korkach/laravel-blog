<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $articles = Article::lastLimit(3);
        return view('index', compact('articles'));
    }
}
