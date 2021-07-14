<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'PostController@getAllPost')->name('home');
Route::get('/', function(){
    return redirect()->route('home');
});

Route::get('/post/{id}','PostController@showPost')->name('post');

Route::middleware('guest')->group(function() {
    // Register
    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister');

    // Login
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin');

});

Route::middleware('auth')->group(function(){
    // Logout
    Route::post('/logout', 'AuthController@postLogout')->name('logout');
});

Route::middleware('role:admin')->group(function(){
    // Insert Product
    Route::post('/insert', 'PostController@postInsert')->name('insert');
});