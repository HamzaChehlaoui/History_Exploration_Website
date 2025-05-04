<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    ProduitController,
    ArticleController,
    CommentaireController,
    FavoriteController,
    CommandeController,
    ProfileController,
    DashboardController,
    SearchController,
    StripeController,
    NotificationController,
};
use App\Http\Controllers\Auth\SocialAuthController;

/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/
Route::view('/', 'Visiteur.index')->name('home');
Route::view('/Explorer', 'Visiteur.Explorer_Page')->name('explorer');
Route::view('/about', 'Visiteur.Page_About')->name('about');
Route::view('/PageConditions', 'Visiteur.PageConditions')->name('conditions');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register.form');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::view('/login', 'Auth.login')->name('login.form');
});

/*
|--------------------------------------------------------------------------
| Social Authentication
|--------------------------------------------------------------------------
*/
Route::controller(SocialAuthController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('login.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
    Route::get('auth/facebook', 'redirectToFacebook')->name('login.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

/*
|--------------------------------------------------------------------------
| Produit Public Routes
|--------------------------------------------------------------------------
*/
Route::controller(ProduitController::class)->group(function () {
    Route::get('/Stor', 'index')->name('store');
    Route::post('/update-stock', 'updateStock')->name('update.stock');
});

/*
|--------------------------------------------------------------------------
| Search
|--------------------------------------------------------------------------
*/
Route::get('/search', [SearchController::class, 'search'])->name('article.search');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Products & Stock
    Route::resource('products', ProduitController::class);
    Route::post('/restore-stock', [ProduitController::class, 'restoreStock']);

    // Commandes
    Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show');

    // Stripe
    Route::post('/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
    Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'delete'])->name('notifications.delete');

    // Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/{id?}', 'show')->name('profile.show');
        Route::get('/edit.profile', 'edit')->name('edit.profile');
        Route::put('/profile/update', 'update')->name('profile.update');
        Route::get('/profile/favorites/{id?}', 'favorites')->name('profile.favorites');
        Route::post('/profile/favorites/toggle/{articleId}', 'toggleFavorite')->name('profile.toggleFavorite');
    });

    // Favorites
    Route::controller(FavoriteController::class)->group(function () {
        Route::post('/favorites/{article}', 'toggle')->name('favorites.toggle');
        Route::get('/favorites', 'index')->name('favorites.index');
    });

    // Comments
    Route::controller(CommentaireController::class)->prefix('commentaires')->name('commentaires.')->group(function () {
        Route::post('/', 'store')->name('store');
        Route::put('/{commentaire}', 'update')->name('update');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Articles (User)
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/article/{id}', 'index')->name('articles.index');
        Route::get('/articles', 'index');
        Route::get('/articles/{id}', 'show')->name('articles.show');
        Route::get('/submit-article', 'create')->name('article.create');
        Route::post('/submit-article', 'store')->name('article.store');
        Route::get('/articles/{id}/edit', 'edit')->name('articles.edit');
        Route::put('/article/{id}', 'update')->name('articles.update');
        Route::delete('/articles/{id}', 'destroy')->name('articles.destroy');
    });

    // Cart & Thanks
    Route::view('/cart', 'User.Cart_page')->name('cart');
    Route::view('/thank_you', 'User.thank_you');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    // Produits (Admin)
    Route::controller(ProduitController::class)->group(function () {
        Route::get('/Add_prodact', 'create')->name('produits.create');
        Route::post('/Add_prodact', 'store')->name('produits.store');
        Route::put('/produits/{produit}', 'update')->name('produits.update');
    });

    // Dashboard
    Route::get('/Dashbord_admin', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::delete('/users/{user}', [DashboardController::class, 'destroy'])->name('users.destroy');

    // Articles (Admin)
    Route::get('/admin/articles', [ArticleController::class, 'adminIndex'])->name('admin.articles.index');
    Route::post('/admin/articles/{article}/approve', [ArticleController::class, 'approve'])->name('article.approve');
    Route::post('/admin/articles/{article}/reject', [ArticleController::class, 'reject'])->name('article.reject');
    Route::delete('/admin/articles/{article}', [DashboardController::class, 'destroy_Article'])->name('article.destroy');
});
