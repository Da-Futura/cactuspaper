<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    // This defines the one to many relationship between
    // Keywords and KeySentiments.
    // Each Keyword can have many KeySentiments.
    // Corresponding one in KeySentiment model.
    public function keySentiment(){
        return $this->hasMany(KeySentiment::class);
    }
}
