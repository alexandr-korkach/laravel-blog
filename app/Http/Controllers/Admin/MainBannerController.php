<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\MainBanner;
use Illuminate\Http\Request;

class MainBannerController extends Controller
{
    public function addArticle($id){
        $article = Article::query()->find($id);

        if($article){
           MainBanner::create([
               'article_id' => $article->id
           ]);
            return redirect()->back()->with(['success'=>'Статтю додано до баннера']);
        }
        return redirect()->back()->with(['error'=>'Помилка! Статтю не знайдено']);


    }

    public function removeArticle($id){

        $bannerItem = MainBanner::query()->where('article_id', $id);
        if($bannerItem){
            $bannerItem->delete();
            return redirect()->back()->with(['success'=>'Статтю видалено з баннера']);
        }
        return redirect()->back()->with(['error'=>'Помилка! Статтю не знайдено']);
    }
}
