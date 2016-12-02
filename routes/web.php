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
Route::get('/home', 'HomeController@index');

// Goes to a page which displays a list of all articles.
Route::get('/articles', 'ArticlesController@index');

// Goes to a specific article page given it's id.
// It will display an article as well as all associated comments.
Route::get('/article/{article}', 'ArticlesController@show');

// Creates a new comment by
// passing  an article id and the request to the Comments controller
Route::post('/article/{article}/newComment', 'CommentsController@store');

// Creates a new article tied to the current user
Route::post('/article/create', 'WatsonController@storeArticle');

// Goes to a specific group page given its id.
// It will display the group and all associated contents.
Route::get('/group/{group}', 'GroupsController@show');

Route::get('/explore/{article}', 'ArticlesController@explore');


// Testing Authentication
Route::get('/dashboard', 'HomeController@index');
