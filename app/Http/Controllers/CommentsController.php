<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Article;
use App\User;


class CommentsController extends Controller
{

    // Adds middleware preventing anyone not logged in from accessing
    // Redirects to login
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Function stores a new note given its corresponding article and group
    public function store(Article $article, Request $request){ // God bless implict model bindings!

        $user = $request->user();
        $group = $article->group;
        //Checks if logged in and member of the group, creates the comment and redirects to
        // last page
        $permission = $this->isGroupMember($user, $group);

        if($permission){
            $comment = new Comment($request->all());
            $user_id = $user->id;
            $article->addComment($comment, $user_id); // this is a function on the Article model itself.
            return back();
        } else{
            // Otherwise, redirects to login page
            return back();
        }
    }

    //This is how we check if a given user is a member of the group
    function isGroupMember($user, $group){
        $groupId = $group->id;
        $memberships = $user->memberships;

        $permission = false;

        // If we needed some more authentication, we could add.
        // && user_role = "teacher".
        foreach($memberships as $membership){
            if($groupId === $membership->group_id){
                $permission = true;
                break;
            }
        }
        return $permission;
    }
}
