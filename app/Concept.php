<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    // This allows us to assign values specific properties of Article objects
    // Otherwise it could be a security hazard where
    // People could edit other users posts by editing the user_id etc
    protected $fillable = [
        'name'
    ];

    // This defines the one to many relationship between
    // Concepts and ConceptRelationships
    // Each Concept can have many ConceptRelationships
    // Corresponding one in ConceptRelationship Mode.
    public function conceptRelationships(){
        return $this->hasMany(ConceptRelationship::class);
    }

}
