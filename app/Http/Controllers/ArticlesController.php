<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use App\ConceptRelationship;
use App\Concept;
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
        $article->load('comments');
        return view('articles.show', compact('article'));
    }


    // Finds the Article associated with the id
    // Calls the articles/explore view
    public function explore(Article $article){
        $article->load('conceptRelationships');
        $concept_id = $article->conceptRelationships[0]['concept_id'];
        $relArticleIds = $this->getRelArticles($concept_id);
        $relatedArticles = Article::findMany($relArticleIds);

        $relatedArticleTitles = $this->getRelArticleTitles($relatedArticles);

        return $relatedArticleTitles;

        return view('articles.explore', compact('article'));
    }


    // Returns an array of article names given an array of article objects
    function getRelArticleTitles($articleObjectArray){
        $articleTitles = [];
        foreach($articleObjectArray as $relArticle){
            $title = $relArticle->title;
            array_push($articleTitles, $title);
        }
        return $articleTitles;
    }

    // Returns an array or relative article IDs given the concept id
    function getRelArticles($conceptId){
        $concept = Concept::find($conceptId);
        $relationships = $concept->conceptRelationships;

        $relArticleArray = [];
        foreach($relationships as $relationship){
            array_push($relArticleArray, $relationship["article_id"]);
        }

        return $relArticleArray;
    }

}
