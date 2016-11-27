<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // This defines the one to many relationship between
    // Articles and comments.
    // There is a corresponding belongsTo function in the Comment model.
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
