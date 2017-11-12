<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/myconfess', 'HomeController@myConfess')->name('myconfess');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/storePosts','HomeController@storePosts');

Route::post('/post_like','HomeController@post_like');
Route::post('/dislike','HomeController@dislike');

Route::get('deletePost/{id}','HomeController@deletePost');
