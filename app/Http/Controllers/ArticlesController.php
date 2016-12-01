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

        return $relArticles = $this->getRelArticles($concept_id);

        $relatedArticleTitles = $this->getRelArticleTitles($relatedArticles);
        return response()->json(["concept name" =>["titles" => $relatedArticleTitles]]);

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



    // Returns an array or relative Articles given the concept id
    // Is of the form:
    /*
      {"Mars":{"articles":[{"0.95":{"id":10,"title":"A sightseer\u2019s guide to Mars","url":"http:\/\/www.bbc.com\/future\/story\/20161104-a-sightseers-guide-to-mars","author":"Zaria Gorvett","summary":"mars","user_id":1,"group_id":1,"created_at":"2016-11-30 14:25:33","updated_at":"2016-11-30 14:25:33"}},{"0.98":{"id":11,"title":"Mars probe returns first pictures - BBC News","url":"http:\/\/www.bbc.com\/news\/science-environment-38147682","author":"BBC News","summary":"More Mars","user_id":1,"group_id":1,"created_at":"2016-11-30 17:11:36","updated_at":"2016-11-30 17:11:36"}}]}} */

    function getRelArticles($conceptId){
        $concept = Concept::find($conceptId);
        $relationships = $concept->conceptRelationships;

        $relArticleArray = []; // returns an array of related article IDs
        $relRelevanceArray = [];
        foreach($relationships as $relationship){
            array_push($relArticleArray,  $relationship["article_id"]);
            array_push($relRelevanceArray, $relationship->relevance);
        }

        $relatedArticles = Article::findMany($relArticleArray);

        $articleWithSentiment = array();

        $arrayLength = count($relRelevanceArray);

        for($i = 0; $i <$arrayLength; $i++){
            $newPair = [$relRelevanceArray[$i] => $relatedArticles[$i]];
            array_push($articleWithSentiment, $newPair);
        }

        $conceptName = $concept->name;
        return [$conceptName => ["articles" => $articleWithSentiment]];

    }

}
