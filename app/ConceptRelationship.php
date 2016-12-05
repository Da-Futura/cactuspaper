<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConceptRelationship extends Model
{
    // This allows us to assign values specific properties of Article objects
    // Otherwise it could be a security hazard where
    // People could edit other users posts by editing the user_id
    protected $fillable = [
        'concept_id', 'article_id','relevance'
    ];

    // Describes the many to one relationship between
    // ConceptRelationships and Articles
    // Each ConceptRelationship refers to a single article.
    public function article(){
        return $this->belongsTo(Article::class);
    }


    // Describes the many to one relationship between
    // ConceptRelationships and Concepts
    // Each ConceptRelationship has a single Concept
    public function concept(){
        return $this->belongsTo(Concept::class);
    }

}
