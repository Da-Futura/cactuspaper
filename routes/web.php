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

Route::get('/','HomeController@index');
Auth::routes();

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

// Creates a new membership between the signed in user and the group id passed.
Route::post('/group/new', 'GroupsController@store');

// Soon.
Route::get('/explore/{article}', 'ArticlesController@explore');


// User dashboard with group list and add group.
// Login redirects to here.
Route::get('/dashboard', 'HomeController@index');
