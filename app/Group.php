<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function memberships(){
        return $this->hasMany(Membership::class);
    }
}
