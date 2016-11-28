<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // This defines the one to many relationship between
    // Groups and Articles
    // One group can have many articles
    // Correspinding function in Article model.
    public function articles(){
        return $this->hasMany(Article::class);
    }

    // This defines the one to many relationship between
    // Groups and Memberships.
    // One group can have many memberships
    // Correspinding function in Membership Model.
    public function memberships(){
        return $this->hasMany(Membership::class);
    }
}
