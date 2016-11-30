<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeySentiment extends Model
{

    // Describes the many to one relationship between
    // KeySentiments and Articles.
    // Each Key Sentiment refers to a single article.
    public function article(){
        return $this->belongsTo(Article::class);
    }


    // Describes the many to one relationship between
    // KeySentiments and Keywords.
    // Each KeySentiment refers to a single Keyword.
    public function keyword(){
        return $this->belongsTo(Keyword::class);
    }


}
