<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use Auth;
use App\User;


class ArticlesController extends Controller
{

    // Adds middleware preventing anyone except teachers from
    // Calling the store method to create articles
    public function __construct()
    {
        //        $this->middleware('teacher', ['only' =>'store']);
    }

    // Queries the database for all articles and then passes an array of that
    // to the articles/index view.
    public function index(){
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Finds the Article associated with the id
    // Calls the articles/show view
    public function show(Article $article){
        $article->load('comments.user');
        return view('articles.show', compact('article'));
    }

    // Function stores a new article given its corresponding user
    public function store(Request $request){

        //Checks if logged in, creates the article and redirects to
        // last page
        if(Auth::user()){
            $article = new Article($request->all());
            $user_id = Auth::id();
            $article->user_id = $user_id;
            $article->save();

            return back();

        } else{
            // Otherwise, redirects to login page
            return view('auth.login');
        }

    }

    // Returns the author given an article.
    public function alchemyTest(Article $article){
        $author = $article->getCombined();
        return $author;

    }

}
