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
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group.
|
*/

// Static pages
Route::view('/', 'Visiteur.index')->name('home');
Route::view('/Explorer', 'Visiteur.Explorer_Page')->name('explorer');
Route::view('/about', 'Visiteur.Page_About')->name('about');
Route::view('/PageConditions', 'Visiteur.PageConditions')->name('conditions');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register.form');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::view('/login', 'Auth.login')->name('login.form');
});

// Social authentication routes
Route::middleware(['web'])->group(function () {
    Route::controller(SocialAuthController::class)->group(function () {
        Route::get('auth/google', 'redirectToGoogle')->name('login.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');
        Route::get('auth/facebook', 'redirectToFacebook')->name('login.facebook');
        Route::get('auth/facebook/callback', 'handleFacebookCallback');
    });
});







// Route::resource('articles', ArticleController::class);
Route::controller(ProduitController::class)->group(function () {

    Route::get('/Stor', 'index')->name('store');
    Route::post('/update-stock',  'updateStock')->name('update.stock');
});

Route::middleware(['auth', 'admin'])->group(function () {

// Store and products routes
Route::controller(ProduitController::class)->group(function () {
    Route::get('/Add_prodact', 'create')->name('produits.create');
    Route::post('/Add_prodact', 'store')->name('produits.store');
    Route::put('/produits/{produit}',  'update')->name('produits.update');

});

// Order routes
Route::get('/Dashbord_admin', [DashboardController::class, 'index'])->name('dashboard.index');// Authentication routes
Route::delete('/users/{user}', [DashboardController::class, 'destroy'])->name('users.destroy');
Route::get('/admin/articles', [ArticleController::class, 'adminIndex'])->name('admin.articles.index');
Route::post('/admin/articles/{article}/approve', [ArticleController::class, 'approve'])->name('article.approve');
Route::post('/admin/articles/{article}/reject', [ArticleController::class, 'reject'])->name('article.reject');
Route::delete('/admin/articles/{article}', [DashboardController::class, 'destroy_Article'])->name('article.destroy');

});




Route::get('/search', [SearchController::class, 'search'])->name('article.search');

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProduitController::class);
    Route::post('/process-payment', [CommandeController::class, 'store'])->name('process.payment');
    Route::post('/restore-stock', [ProduitController::class, 'restoreStock']);

    Route::post('/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
    Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
    Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'delete'])->name('notifications.delete');

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile/{id?}', 'show')->name('profile.show');
    Route::get('/edit.profile', 'edit')->name('edit.profile');
    Route::put('/profile/update', 'update')->name('profile.update');
    Route::get('/profile/favorites/{id?}', 'favorites')->name('profile.favorites');
    Route::post('/profile/favorites/toggle/{articleId}', 'toggleFavorite')->name('profile.toggleFavorite');
});
// Favorites routes
Route::controller(FavoriteController::class)->group(function () {
    Route::post('/favorites/{article}', 'toggle')->name('favorites.toggle');
    Route::get('/favorites', 'index')->name('favorites.index')->middleware('auth');
});

// Comment routes
Route::controller(CommentaireController::class)->prefix('commentaires')->name('commentaires.')->group(function () {
    Route::post('/', 'store')->name('store');
    Route::put('/{commentaire}', 'update')->name('update');
    Route::patch('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});
Route::view('/cart', 'User.Cart_page')->name('cart');
Route::view('/thank_you', 'User.thank_you');
// Article routes
Route::controller(ArticleController::class)->group(function () {
    Route::get('/article/{id}', 'index')->name('articles.index');
    Route::get('/articles', 'index');
    Route::get('/articles/{id}', 'show')->name('articles.show');
    Route::get('/submit-article', 'create')->name('article.create');
    Route::post('/submit-article', 'store')->name('article.store');
    Route::get('/articles/{id}/edit', 'edit')->name('articles.edit');
    Route::delete('/articles/{id}',  'destroy')->name('articles.destroy');
    Route::put('/article/{id}', 'update')->name('articles.update');
});
});
