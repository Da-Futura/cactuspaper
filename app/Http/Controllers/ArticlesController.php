<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use App\Group;
use App\ConceptRelationship;
use App\Concept;
use Auth;
use Anpp\User;


class ArticlesController extends Controller
{

    // Adds middleware preventing anyone not logged in from accessing
    // Redirects to login
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Queries the database for all articles and then passes an array of that
    // to the articles/index view.
    public function index(){
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Finds the Article associated with the id
    // Calls the articles/show view
    public function show(Article $article, Request $request){
        $user = $request->user();
        $article->load('comments');
        $responseArray = [
            "user" => $user,
            "article" => $article
        ];
        return view('articles.show', $responseArray);
    }


    // Given an article, it returns
    public function explore(Article $article){
        $article->load('conceptRelationships');

        $conceptIdArray = $this->getConceptIdArray($article);
        $relArticleArray = $this->getRelArticleArray($conceptIdArray);
        return $relArticleArray;
        $responseArray = ["article" => $article, "relativeArticles" => $relArticleArray];
        return view('articles.explore')->with($responseArray);
    }




    // Given an array of integer concept_ids, returns an assoc array of all their related articles
    function getRelArticleArray($conceptIdArray){
        $relArticleArray = [];
        foreach($conceptIdArray as $conceptId){
            $relArticle = $this->getRelArticles($conceptId);
            $relArticleId = $relArticle->id;
            array_push($relArticleArray, $relArticleId);
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

    // Returns an array of article ids given an array of article objects
    function getRelArticleIds($articleObjectArray){
        $articleIds = [];
        foreach($articleObjectArray as $relArticle){
            $articleId = $relArticle->id;
            array_push($articleIds, $articleId);
        }
        return $articleIds;
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
