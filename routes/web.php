<?php

use App\Events\UserComment;
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

Route::get('/terms', function() {
    return view('terms');
})->name('terms');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/myconfess', 'HomeController@myConfess')->name('myconfess');
Route::get('/tags', 'HomeController@tags')->name('tags');

Route::get('/posts/{id}/show', 'SinglePost@show'); // I don't want to pass post id in link
                                                    // Can we make it with POST request?


Route::get('/comment', function(){
    event(new UserComment());
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/storePosts','HomeController@storePosts');


Route::post('/post_like','HomeController@post_like');
Route::post('/dislike','HomeController@dislike');

Route::post('/postComment','HomeController@postComment');

Route::post('deletePost','HomeController@deletePost');
