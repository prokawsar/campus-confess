<?php

use App\Events\UserComment;
use App\UserPost;

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
    
    if (Auth::check())
    {
        $allPosts=UserPost::with('user')->orderBy('created_at', 'DESC')->paginate(5); // will make infinite scroll
        return view('home', compact('allPosts'));
    }

    return view('welcome');
});

Route::get('/terms', function() {
    return view('terms');
})->name('terms');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/myconfess', 'HomeController@myConfess')->name('myconfess');
Route::get('/category', 'HomeController@category')->name('category');
Route::get('/category/{name}', 'CategoryPost@show');

Route::get('/posts/{id}/show', 'SinglePost@show'); // I don't want to pass post id in link
                                                    // Can we make it with POST request?

Route::get('/comment', function(){
    event(new UserComment());
});

Route::post('/storePosts','HomeController@storePosts');

Route::post('/post_like','HomeController@post_like');
Route::post('/dislike','HomeController@dislike');

Route::post('/postComment','HomeController@postComment');

Route::post('deletePost','HomeController@deletePost');

Route::get('/vote', 'VoteController@index')->name('vote');

Route::post('/createVote','VoteController@CreateVote');
