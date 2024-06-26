<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Concept;
use App\ConceptRelationship;
use App\Article;
use Illuminate\Http\Request;
use GuzzleHttp\Client;



class WatsonController extends Controller
{

    // Adds middleware preventing anyone not logged in from accessing
    // Redirects to login
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Function stores a new article given its corresponding user
    public function storeArticleBASE(Request $request){


        // Does not allow for duplicate article urls.
        // Just redirects to page without showing an error though.
        $this->validate($request,
                        [
                            'url' => 'unique:articles'
                        ]);


        //Checks if logged in, creates the article, stores the concepts and redirects to
        // last page
        if(Auth::user()){
            $article = new Article($request->all());
            $articleUrl = $article->url;

            $articleTitle = $this->getTitle($articleUrl); // Fetches title from Watson
            $article->title = $articleTitle;


            $articleAuthor = $this->getAuthor($articleUrl);
            $article->author = $articleAuthor;


            $userId = Auth::id();  // alternately $request->user();
            $article->user_id = $userId;
            $article->save();

            $conceptsObject = $this->getConcepts($articleUrl);
            $this->storeConcepts($conceptsObject, $article->id);


            return back(); // Need to make it explicitly point to the groups.

        } else{
            // Otherwise, redirects to login page
            return view('auth.login');
        }

    }




    // Function stores a new article given its corresponding user
    public function storeArticleAJAX(Request $request){
        $groupId = $request->group_id;
        return $request;
        // Does not allow for duplicate article urls.
        // Just redirects to page without showing an error though.
        $this->validate($request,
                        [
                            'url' => 'unique:articles'
                        ]);



        //Checks if logged in, creates the article, stores the concepts and redirects to
        // last page
        $article = new Article(["url"=>$request->url, "summary"=> $request->summary, "user_id" => $request->user_id, "group_id"=>$request->group_id]);
        $articleUrl = $article->url;

        $articleTitle = $this->getTitle($articleUrl); // Fetches title from Watson
        $article->title = $articleTitle;


        $articleAuthor = $this->getAuthor($articleUrl);
        $article->author = $articleAuthor;


        $userId = $request->user_id;  // alternately $request->user();
        $article->user_id = $userId;
        $article->save();

        $conceptsObject = $this->getConcepts($articleUrl);
        $this->storeConcepts($conceptsObject, $article->id);

        return;

    }


    // Only Creates a concept if it didn't exist before.
    // Creates a new concept relationshsip for each concept.
    function storeConcepts($conceptsObject, $articleId){

        foreach($conceptsObject->concepts as $concept){
            $conceptRelevance = $concept->relevance;
            $conceptName = $concept->text;
            $newConcept = Concept::firstOrCreate(['name' => $conceptName]);  // Searches database for concept by id, if found, returns the object, else, creates one.
            $this->storeConceptRelationship($newConcept, $articleId, $conceptRelevance );

        }
        return true;

    }

    // Creates a new Concept relationship given a Concept Object, an article id and the concept relevance
    // Remember that concept relecence is NOT stored in the Concept Model
    // So we need to explicitly pass it.
    function storeConceptRelationship($conceptObject, $articleId, $conceptRelevance){
        $newRelationship = new ConceptRelationship;
        $newRelationship->article_id = $articleId;
        $newRelationship->concept_id = $conceptObject->id;
        $newRelationship->relevance = $conceptRelevance;
        $newRelationship->save();
    }

    ////////////////////////////// WATSON API FUNCTIONS ////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    // Given a url, uses watsonCall to return the author as a string.
    function getAuthor($url){
        $requestType = 'url/URLGetAuthors';
        $authorObject = $this->watsonCall($requestType, $url); //Returns the author object
        return $authorObject->authors->names[0];
        $authorName = $authorObject->authors->names[0]; // Extracts the first name in the string of authors.

        // Error reading some edge cases.
        if($authorName == null)$authorName = "Unknown" ; // Hopefully this default fixes it.
        return $authorName;
    }

    // Given a url, uses watsonCall to return the title as a string.
    function getTitle($url){
        $requestType = 'url/URLGetTitle';
        $titleObject = $this->watsonCall($requestType, $url); //Returns the title object
        $titleName = $titleObject->title; // Extracts the first name in the string of titles.
        return $titleName;
    }

    // Given a url, asks Watson (using GuzzleHTTP) for concept data and returns an object with it.
    // Not a simple string response like getTitle.
    // We need to do something like $responseObject->name, $responseObject->relevence later.
    function getConcepts($url){
        $client = new Client([
            'base_uri' => 'https://watson-api-explorer.mybluemix.net/alchemy-api/calls/',
            'timeout'  => 30.0,
        ]);

        $requestType = "url/URLGetRankedConcepts";

        $apikey = getenv('ALCHEMY_API_KEY'); // The api key which is stored in .env for security
        $outputMode="json"; // The format to return.
        $maxRetrieve=10; // Number of concepts retreived. Reccomended was 8, but I grab more because
        // I'm okay with loosery reccomendations.
        // For lots of articles they don't even have 10 concepts though.
        // Concepts are ranked in order of relevence.

        // This is where the call is made. The requestType is appended to the base_uri
        // Then all the values are passed in as parameters.
        $response = $client->request('GET', $requestType , [
            'query' => ['apikey' => $apikey,
                        'url' => $url,
                        'outputMode' => $outputMode,
                        'maxRetrieve' => $maxRetrieve
            ]
        ]);

        $data = $response->getBody(); // data is now a json string.
        $responseObject = json_decode($data); // this converts it to an object.

        return $responseObject;

    }








    // We could have used getCombined Data to save on a api call, but it makes the code more complicated.
    function watsonCall($type, $url){

        // Initiate the guzzler client
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://watson-api-explorer.mybluemix.net/alchemy-api/calls/',
            // You can set any number of default request options.
            'timeout'  => 30.0, // GUZZLE reccomended 10ish, but I set it to 30 because the Watson API seemed slower
        ]);

        // These are the variables we use to construct the request.
        $requestType = $type; // The type of request specific to alchemy

        $apikey = getenv('ALCHEMY_API_KEY'); // The api key which is stored in .env for security
        $outputMode="json"; // The format to return.


        // This is where the call is made. The requestType is appended to the base_uri
        // Then all the values are passed in as parameters.
        $response = $client->request('GET', $requestType , [
            'query' => ['apikey' => $apikey,
                        'url' => $url,
                        'outputMode' => $outputMode
            ]
        ]);


        // This gets the contents of the response, but it's in a string format
        $data = $response->getBody();
        $responseObject = json_decode($data);

        return $responseObject;

    }



    // Given a url, it returns a json of all the keywords and their corresponding sentiments.
    // The difference between this and watsonCall+getX is the extra query parameter 'sentiment'
    // Maybe I could pass a third boolean to watsonCall? (when I actually start using sentiment, I'll refactor.)
    function getKeywordsWithSentiment ($url){

        // Initiate the guzzler client
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://watson-api-explorer.mybluemix.net/alchemy-api/calls/',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);

        // These are the variables we use to construct the request.
        $requestType = "url/URLGetRankedKeywords"; // The type of request specific to alchemy
        // https://watson-api-explorer.mybluemix.net/apis/alchemy-language-v1?cm_mc_uid=46759359586214802841274&cm_mc_sid_50200000=1480//381318#!/Authors/get_url_URLGetAuthors

        $apikey = getenv('ALCHEMY_API_KEY'); // The api key which is stored in .env for security
        $outputMode="json"; // The format to return.
        $sentimentFlag = 1;

        // This is where the call is made. The requestType is appended to the base_uri
        // Then all the values are passed in as parameters.
        $response = $client->request('GET', $requestType , [
            'query' => ['apikey' => $apikey,
                        'url' => $url,
                        'outputMode' => $outputMode,
                        'sentiment' => $sentimentFlag // THIS IS THE DIFFERENCE
            ]
        ]);

        $data = $response->getBody();
        $responseObject = json_decode($data);

        return $responseObject;
    }


}
