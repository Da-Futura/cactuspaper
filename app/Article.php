<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title', 'url', 'summary', 'user_id'
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

    public function group(){
        return $this->belongsTo(Group::class);
    }

    // Adds a comment to an article given it and it's user_id;
    public function addComment(Comment $comment, $userId){
        $comment->user_id = $userId;
        return $this->comments()->save($comment);
    }
}
