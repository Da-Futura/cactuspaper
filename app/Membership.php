<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    // Defines the many to one relationship between
    // Memberships and Groups.
    // A Membership has one group
    // Corresponding function in Group Model.
    public function group(){
        return $this->belongsTo(Group::class);
    }

    // Defines the many to one relationship between
    // Memberships and Users
    // A Membership has one User.
    // Corresponding function in User Model.
    public function user(){
        return $this->belongsTo(User::class);
    }

}
