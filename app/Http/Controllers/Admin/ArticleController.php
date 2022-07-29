<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\MainBanner;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $banner = MainBanner::query()->pluck('article_id')->all();
        //$bannerArticles = Article::query()->with('category', 'tags')->orderBy('created_at', 'desc')->get()->only($banner);
        $articles = Article::query()->with('category', 'tags')->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.articles.index', compact('articles', 'banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::query()->pluck('title', 'id')->all();
        $tags = Tag::query()->pluck('title', 'id')->all();
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {

        $data = $request->all();
        $data['img'] = Article::uploadImage($request);
        $data['user_id'] = Auth::user()->id;
        $article = Article::create($data);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index')->with(['success'=>'Статтю додано']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::query()->pluck('title', 'id')->all();
        $tags = Tag::query()->pluck('title', 'id')->all();
        return view('admin.articles.edit', compact('categories', 'tags', 'article'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, $id)
    {
        $data = $request->all();
        $article = Article::find($id);

        $data['img'] = Article::uploadImage($request, $article->img);
        $article->update($data);
        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index')->with(['success'=>'Статтю успішно відредаговано']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)

    {
        $article = Article::find($id);
        $article->tags()->sync([]);
        Storage::delete($article->img);
        $article->delete();
        return redirect()->route('articles.index')->with(['success'=>'Статтю успішно видалено']);
    }
}
