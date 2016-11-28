<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //Dammit JL, don't forget this when you're making forms.
    protected $fillable = [
        'name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // This defines the one to many relationship
    // Between Users and Comments
    // Corresponding one in the Comment model
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // This defines the one to many relationship
    // Between Users and Articles
    // Corresponding one in the Article model
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
