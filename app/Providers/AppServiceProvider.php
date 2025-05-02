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
            ['Visiteur.index', 'Admin.Dashbord_admin','Visiteur.Explorer_Page'],
            function ($view) {
                $articles = Article::paginate(6);
                $view->with('articles', $articles);
            }
        );
        View::composer('partials.navbare_visitoure.nav', function ($view) {
            if (Auth::check()) {
                $role = auth()->user()->role_id;
                $count = auth()->user()->unreadNotifications()->count();
            } else {
                $role = null;
                $count = 0;
            }

            $view->with([
                'unreadNotificationsCount' => $count,
                'role' => $role,
            ]);
        });

    }
}
