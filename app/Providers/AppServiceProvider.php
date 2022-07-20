<?php

namespace App\Providers;

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
    }

    public function  activeLinks() {
        View::composer('layouts.main', function($view) {
            $view->with('mainLink', request()->is('/') ? 'active' : '');
            $view->with('blogLink', (request()->is('blog') or  request()->is('blog/*')) ? 'active' : '');
        });
    }
}
