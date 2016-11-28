<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'body', 'article_id', 'user_id'
    ];

    // This defines the many to one relationship
    // between comments and articles
    // There is a corresponding hasMany function in the Article model.
    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
