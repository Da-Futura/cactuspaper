<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Pulls in the guzzle client
use GuzzleHttp\Client;
use GuzzleHttp\articleFunctions;


class Article extends Model
{

    protected $fillable = [
        'title', 'url', 'summary', 'user_id', 'group_id'
    ];

    // This defines the one to many relationship between
    // Articles and comments.
    // There is a corresponding belongsTo function in the Comment model.
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // This defines the many to one relationship between
    // Articles and Users.
    // There is a corresponding one in the User Model.
    public function user(){
        return $this->belongsTo(User::class);
    }

    // This defines the many to one relationship between
    // Articles and Groups.
    // An article belongs to a single group
    // Corresponding one in Group model.
    public function group(){
        return $this->belongsTo(Group::class);
    }

    // Adds a comment to an article given it and it's user_id;
    public function addComment(Comment $comment, $userId){
        $comment->user_id = $userId;
        return $this->comments()->save($comment);
    }






    // GUZZLER FUNCTIONS

    // Returns a json of the author of an article given it's hardcoded url
    function getAuthor(){

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
        $url = $this->url;
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
