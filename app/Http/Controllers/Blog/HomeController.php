<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\MainBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $articles = Article::lastLimit(3);
        $bannerItems = MainBanner::query()->with('article')->get();
        return view('content.index', compact('articles', 'bannerItems'));
    }
}
