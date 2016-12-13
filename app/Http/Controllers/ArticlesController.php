<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use App\Group;
use App\ConceptRelationship;
use App\Concept;
use Auth;
use App\User;


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
        return view('articles.index', compact('articles')); // compact('articles') returns an array because the views accept an array of values.
    }

    // Finds the Article associated with the id
    // Calls the articles/show view
    public function show(Article $article, Request $request){
        $user = $request->user();
        $article->load('comments'); // eager loading all associated comments so we don't query the database a bunch of times.
        $responseArray = [  // Here we manually construct the array to pass to the view.
            "user" => $user, // It's just more legible than trying to the a weird /compact/ call.
            "article" => $article
        ];

        return view('articles.show', $responseArray);
    }



    // Finds the Article associated with the id
    // Returns the relavent articlesContent html
    public function articleContent(Article $article, Request $request){
        $user = $request->user();
        $article->load('comments'); // eager loading all associated comments so we don't query the database a bunch of times.
        $responseArray = [  // Here we manually construct the array to pass to the view.
            "user" => $user, // It's just more legible than trying to the a weird /compact/ call.
            "article" => $article
        ];

        return view('articles.articleContent', $responseArray);
    }



    // Given an article, it returns a view with all associated articles.
    // It first gets all the concepts for that article.
    // Then for each concept it finds all the other articles linked to that concept.
    // It is automatically sorted by relevence because the concepts of articles
    // are stored in order of relevence in an array.

    public function explore(Article $article, Request $request){
        $article->load('conceptRelationships'); // eager loads all concept relationships

        $rootConceptRelationships = $article->conceptRelationships;
        // Remember that a concept relationships consists of
        // article id, concept id, and relevence so to get the actual associated concepts,
        // We need to return the concept relationship object, and then call
        // conceptRelationship -> concept.

        $rootConcepts = [];

        foreach($rootConceptRelationships as $rootConceptRelationship){
            $rootConcept = $rootConceptRelationship->concept;
            array_push($rootConcepts, $rootConcept);
        }

        // Now that we have array of the concepts associated with the root article,
        // We can START at a Concept, and then get all the associated ConceptRelationships.

        $relatedConceptRelationships = [];
        foreach($rootConcepts as $rootConcept){
            $relatedConceptRelationship = $rootConcept->conceptRelationships;
            array_push($relatedConceptRelationships, $relatedConceptRelationship);
        }

        // run these tests to see what the format looks like.
        //        return $relatedConceptRelationships;
        //        return $relatedConceptRelationships[14][0]->article->id;

        $duplicateArray = [$article->id];
        // This is to prevent listing a reccomended article more than once
        // since they might have multiple concepts in common.
        $responseArray = ["article" => $article, "conceptRelationshipArray" => $relatedConceptRelationships, "user" => $request->user(), "duplicateArray" => $duplicateArray];
        return view('articles.explore', $responseArray);
    }


}
