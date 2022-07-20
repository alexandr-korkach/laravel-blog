<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Paginator::useBootstrap();
        Paginator::defaultView('layouts.pagination.custom');
        $this->activeLinks();
        $this->sidebarData();
    }

    public function  activeLinks() {
        View::composer('layouts.header', function($view) {
            $view->with('mainLink', request()->is('/') ? 'active' : '');
            $view->with('blogLink', (request()->is('blog') or  request()->is('blog/*')) ? 'active' : '');
        });
    }

    public function  sidebarData() {
        View::composer('layouts.sidebar', function($view) {
            $view->with('articles', Article::lastLimit(3));
            $view->with('categories', Category::get());
            $view->with('tags', Tag::get());
        });
    }
}
