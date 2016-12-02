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

        $rootConceptRelationships = $article->conceptRelationships;

        $rootConcepts = [];

        foreach($rootConceptRelationships as $rootConceptRelationship){
            $rootConcept = $rootConceptRelationship->concept;
            array_push($rootConcepts, $rootConcept);
        }

        $relatedConceptRelationships = [];
        foreach($rootConcepts as $rootConcept){
            $relatedConceptRelationship = $rootConcept->conceptRelationships;
            array_push($relatedConceptRelationships, $relatedConceptRelationship);
        }

        //        return $relatedConceptRelationships;
        //        return $relatedConceptRelationships[14][0]->article->id;

        $responseArray = ["article" => $article, "conceptRelationshipArray" => $relatedConceptRelationships];
        return view('articles.explore', $responseArray);
    }






}
