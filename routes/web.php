<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
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
});

