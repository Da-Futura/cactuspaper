<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;


class ArticlesController extends Controller
{
    // Queries the database for all articles and then passes an array of that
    // to the articles.index view.
    public function index(){
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }
}
