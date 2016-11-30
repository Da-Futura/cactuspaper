<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConceptRelationship extends Model
{
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
