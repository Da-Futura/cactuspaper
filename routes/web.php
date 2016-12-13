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
Route::get('/home','HomeController@index');
Auth::routes();

// Goes to a page which displays a list of all articles.
Route::get('/articles', 'ArticlesController@index');

// Goes to a specific article page given it's id.
// It will display an article as well as all associated comments.
Route::get('/article/{article}', 'ArticlesController@show');

// Returns the html to fill the article content given it's id
Route::get('/article/{article}/ajax', 'ArticlesController@articleContent');



// Creates a new comment by
// passing  an article id and the request to the Comments controller
Route::post('/article/{article}/newComment', 'CommentsController@store');

// Creates a new article tied to the current user
Route::post('/article/create', 'WatsonController@storeArticleBASE');

// Creates a new article tied to the current user via AJAX
Route::post('/article/create/ajax', 'WatsonController@storeArticleAJAX');



// Goes to a specific group page given its id.
// It will display the group and all associated contents.
Route::get('/group/{group}', 'GroupsController@show');

//Returns the html to fill the group content.
Route::get('/group/{group}/ajax', 'GroupsController@groupContent');


// Creates a new membership between the signed in user and the group id passed.
Route::post('/group/new', 'GroupsController@store');


// Creates a new membership between the signed in user and all avaliable groups
Route::post('/group/new/all', 'GroupsController@storeAll');


// Soon.
Route::get('/explore/{article}', 'ArticlesController@explore');


// User dashboard with group list and add group.
// Login redirects to here.
Route::get('/dashboard', 'HomeController@index');
