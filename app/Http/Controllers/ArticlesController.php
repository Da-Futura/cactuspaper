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


    // Given an article, it returns
    public function explore(Article $article){
        $article->load('conceptRelationships');

        $conceptIdArray = $this->getConceptIdArray($article);

        $relArticleArray = $this->getRelArticleArray($conceptIdArray);
        return response()->json($relArticleArray);

        // $relatedArticleTitles = $this->getRelArticleTitles($relatedArticles);
        // return response()->json(["concept name" =>["titles" => $relatedArticleTitles]]);
        // return $relatedArticleTitles;

        return view('articles.explore', compact('article'));
    }




    // Given an array of integer concept_ids, returns an assoc array of all their related articles
    function getRelArticleArray($conceptIdArray){
        $relArticleArray = [];
        foreach($conceptIdArray as $conceptId){
            $relArticle = $this->getRelArticles($conceptId);
            array_push($relArticleArray, $relArticle);
        }
        return $relArticleArray;
    }


    function getConceptIdArray(Article $article){
        $conceptIdArray = [];
        foreach($article->conceptRelationships as $relationship){
            array_push($conceptIdArray, $relationship['concept_id']);
        }
        return $conceptIdArray;
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
    function getRelArticles($conceptId){
        $concept = Concept::find($conceptId);
        $relationships = $concept->conceptRelationships;

        $relArticleArray = []; // returns an array of related article IDs
        // $relRelevanceArray = [];
        foreach($relationships as $relationship){
            array_push($relArticleArray,  $relationship["article_id"]);
            // $relevance = floatval($relationship->relevance);
            // array_push($relRelevanceArray, $relevance);
        }

        $relatedArticles = Article::findMany($relArticleArray);

        // Ignoring relevance for now
        /*
        $articleWithRelevance = array();

        $arrayLength = count($relRelevanceArray);
        for($i = 0; $i <$arrayLength; $i++){
            $newA = [$relatedArticles[$i]];
            $newPair = ["relevance" => $relRelevanceArray[$i]];
            array_push($articleWithRelevance, $newPair);
        }
        */

        $conceptName = $concept->name;
        return [$conceptName => ["articles" => $relatedArticles]];

    }

}
