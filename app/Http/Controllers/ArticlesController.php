<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use Auth;
use App\User;

// Pulls in the guzzle client
use GuzzleHttp\Client;



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

    // Returns a json of the author of an article given it's hardcoded url
    function alchemyTest(){

        // Initiate the guzzler client
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://watson-api-explorer.mybluemix.net/alchemy-api/calls/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        // These are the variables we use to construct the request.
        $requestType = 'url/URLGetAuthors'; // The type of request specific to alchemy
        // https://watson-api-explorer.mybluemix.net/apis/alchemy-language-v1?cm_mc_uid=46759359586214802841274&cm_mc_sid_50200000=1480381318#!/Authors/get_url_URLGetAuthors

        $apikey = getenv('ALCHEMY_API_KEY'); // The api key which is stored in .env for security
        $url = "http://www.theverge.com/circuitbreaker/2016/11/28/13763912/mit-radio-transmission-millimeter-wave-wireless-vr"; // The url to query
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

        // This converts the string back to a json
        $manage = (array) json_decode($data);

        // Finally, return the json response
        return $manage;
    }
}
