<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Article;
use App\User;

class CommentsController extends Controller
{
    // Function stores a new note given its corresponding article
    public function store(Article $article, Request $request){

        //Checks if logged in, creates the comment and redirects to
        // last page
        if(Auth::user()){
            $comment = new Comment($request->all());

            $user_id = Auth::id();
            $article->addComment($comment, $user_id);

            return back();

        } else{
            // Otherwise, redirects to login page
            return view('auth.login');
        }
    }
}
