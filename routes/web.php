<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Other routes for your site

Route::group([] ,function (){

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::view('/', 'Visiteur.index');
    Route::view('/Explorer', 'Visiteur.Explorer_Page');
    Route::get('/Stor', [ProduitController::class, 'index'])->name('store');
    Route::view('/about', 'Visiteur.Page_About');
    Route::view('/login', 'Auth.login');
    Route::view('/PageConditions','Visiteur.PageConditions');
    Route::view('/cart','User.Cart_page');
    Route::get('/article/{id}', [ArticleController::class,'index'])->name('visiteur.article.index');
    // Comment routes
Route::post('/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store')->middleware('auth');
Route::put('/commentaires/{commentaire}', [CommentaireController::class, 'update'])->name('commentaires.update')->middleware('auth');
Route::delete('/commentaires/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaires.destroy')->middleware('auth');


});

Route::post('/api/paypal/create-order', [PayPalController::class, 'createPayPalOrder'])->name('paypal.create.order');
Route::post('/api/paypal/capture-order', [PayPalController::class, 'capturePayPalOrder'])->name('paypal.capture.order');

Route::middleware(['web'])->group(function () {

    Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
    Route::get('auth/facebook', [SocialAuthController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);


});
