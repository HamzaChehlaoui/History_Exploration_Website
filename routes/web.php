<?php

use Illuminate\Support\Facades\Route;

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



Route::group([] ,function (){
    Route::view('/', 'Visiteur.index');
    Route::view('/Explorer', 'Visiteur.Explorer_Page');
    Route::view('/Stor', 'Visiteur.Online_Stor');
    Route::view('/about', 'Visiteur.Page_About');
    Route::view('/login', 'Auth.login');
    Route::view('/PageConditions','Visiteur.PageConditions');
});
