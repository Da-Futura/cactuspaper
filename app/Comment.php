<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // This defines the many to one relationship
    // between comments and articles
    // There is a corresponding hasMany function in the Article model.
    public function article(){
        $this->belongsTo(Article::class);
    }
}
