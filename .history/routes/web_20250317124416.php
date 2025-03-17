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

Route::get('/', function () {
    return view('index');
});
Route::get('/Explorer', function () {
    return view('Explorer_Page');
});
Route::get('/Stor', function () {
    return view('online');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});

