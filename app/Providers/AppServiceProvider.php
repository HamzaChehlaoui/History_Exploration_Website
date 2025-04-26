<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer(
            ['Visiteur.index', 'Admin.Dashbord_admin'],
            function ($view) {
                $articles = Article::paginate(6);
                $view->with('articles', $articles);
            }
        );
        View::composer('partials.navbare_visitoure.nav', function ($view) {
            $count = Auth::check() ? Auth::user()->unreadNotifications()->count() : 0;
            $view->with('unreadNotificationsCount', $count);
        });

    }
}
