<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Article;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class WatsonController extends Controller
{
    public function test(Article $article){
        $author = $this->getAuthor($article->url);
        return $author;
    }

    // Function stores a new article given its corresponding user
    // Function stores a new article given its corresponding user
    public function storeArticle(Request $request){


        // Does not allow for duplicate article urls.
        // Just redirects to page without showing an error though.
        $this->validate($request,
        [
            'url' => 'unique:articles'
        ]);


        //Checks if logged in, creates the article and redirects to
        // last page
        if(Auth::user()){
            $article = new Article($request->all());
            $articleUrl = $article->url;

            $articleTitle = $this->getTitle($articleUrl); // Fetches title from Watson
            $article->title = $articleTitle;

            $articleAuthor = $this->getAuthor($articleUrl);
            $article->author = $articleAuthor;

            $userId = Auth::id();
            $article->user_id = $userId;

            $keywordObject = $this->getKeywordsWithSentiment($articleUrl);
            return $keywordObject->keywords;
            $article->save();



            return back();

        } else{
            // Otherwise, redirects to login page
            return view('auth.login');
        }

    }


    // We can use getCombined Data to save on a api call, but it makes the code more complicated.
    function watsonCall($type, $url){

        // Initiate the guzzler client
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://watson-api-explorer.mybluemix.net/alchemy-api/calls/',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);

        // These are the variables we use to construct the request.
        $requestType = $type; // The type of request specific to alchemy
        // https://watson-api-explorer.mybluemix.net/apis/alchemy-language-v1?cm_mc_uid=46759359586214802841274&cm_mc_sid_50200000=1480381318#!/Authors/get_url_URLGetAuthors

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

    function getAuthor($url){
        $requestType = 'url/URLGetAuthors';

        $authorObject = $this->watsonCall($requestType, $url); //Returns the author object
        $authorName = $authorObject->authors->names[0]; // Extracts the first name in the string of authors.
        return $authorName;
    }

    function getTitle($url){
        $requestType = 'url/URLGetTitle';
        $titleObject = $this->watsonCall($requestType, $url); //Returns the title object
        $titleName = $titleObject->title; // Extracts the first name in the string of titles.
        return $titleName;
    }



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
                        'sentiment' => $sentimentFlag
            ]
        ]);

        $data = $response->getBody();
        $responseObject = json_decode($data);

        return $responseObject;
    }

}