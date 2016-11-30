<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{

    protected $fillable = [
        'name'
    ];
    // This defines the one to many relationship between
    // Concepts and ConceptRelationships
    // Each Concept can have many ConceptRelationships
    // Corresponding one in ConceptRelationship Mode.
    public function keySentiment(){
        return $this->hasMany(ConceptRelationship::class);
    }
}
