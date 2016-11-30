<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Pulls in the guzzle client
use GuzzleHttp\Client;


class Article extends Model
{

    protected $fillable = [
        'url', 'summary', 'group_id'
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

    // This defines the one to many relationship between
    // Articles and KeySentiments.
    // Each Article can have many KeySentiments.
    // Corresponding one in KeySentiment model.
    public function keySentiment(){
        return $this->hasMany(KeySentiment::class);
    }

    // This defines the one to many relationship between
    // Articles and ConceptRelationships.
    // Each Article can have many ConceptRelationships.
    // Corresponding one in ConceptRelationship model.
    public function conceptRelationship(){
        return $this->hasMany(ConceptRelationship::class);
    }

    // Adds a comment to an article given it and it's user_id;
    public function addComment(Comment $comment, $userId){
        $comment->user_id = $userId;
        return $this->comments()->save($comment);
    }
}
