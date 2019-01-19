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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'MainController@index')->name('main');


Route::get('/about', function() {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostController@post')->name('post');
Route::get('/profile', 'ProfileController@profile')->name('profile')->middleware('auth');
Route::get('/category', 'CategoryController@category')->name('category')->middleware('auth');

Route::post('/addCategory', 'CategoryController@addCategory')->middleware('auth');
Route::post('/addProfile', 'ProfileController@addProfile')->middleware('auth');
Route::post('/addPost', 'PostController@addPost')->middleware('auth');

Route::get('/view/{id}', 'PostController@view')->name('view');
Route::get('/edit/{id}', 'PostController@edit')->name('edit');

Route::post('/editPost/{id}', 'PostController@editPost');

Route::get('/delete/{id}', 'PostController@deletePost');
Route::get('/category/{id}', 'PostController@category');
Route::get('/like/{id}', 'PostController@like');
Route::get('/dislike/{id}', 'PostController@dislike');

Route::post('/comment/{id}', 'PostController@comment');
Route::post('/search', 'PostController@search');
