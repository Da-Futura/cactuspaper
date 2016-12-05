<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // This allows us to assign values specific properties of Article objects
    // Otherwise it could be a security hazard where
    // People could edit other users posts by editing the user_id
    protected $fillable = [
        'body', 'article_id', 'user_id'
    ];

    // This defines the many to one relationship
    // between comments and articles
    // There is a corresponding hasMany function in the Article model.
    public function article(){
        return $this->belongsTo(Article::class);
    }

    // This defines the many to one relationship
    // between comments and users
    // There is a corresponding hasMany function in the User model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
