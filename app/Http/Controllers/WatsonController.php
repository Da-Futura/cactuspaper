<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Article;

class WatsonController extends Controller
{
    public function test(Article $article){
        $author = $this->getAuthor($article->url);
        return $author;
    }

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

    // Returns a json of the top ranked concepts for this Article
    function getRankedConcepts($url){
        $requestType = 'url/URLGetRankedConcepts';
        return $this->watsonCall($requestType, $url);
    }




}
