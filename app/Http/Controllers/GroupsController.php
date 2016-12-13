<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Group;
use App\Membership;
use Auth;
use App\User;


class GroupsController extends Controller
{

    // Adds middleware preventing anyone not logged in from accessing
    // Redirects to login
    public function __construct()
    {
        $this->middleware('auth');
    }


    // If the user is a member of the group, show the group regularly. group.show
    // Else, redirect to group.showGuest which doesn't have the *add new article* form.
    // I should put something there to make it explict that they're viewing as a guest and or clearer nav.
    public function show(Group $group, Request $request){

        $user = $request->user(); // Gets user from request
        $group->load('articles'); // eager loads all articles associated with the group.

        if($this->isGroupMember($user,$group)){
            $responseArray = ["user" => $user, "group" => $group];
            return view('groups.show', $responseArray);
        } else{
            $responseArray = ["user" => $user, "group" => $group];
            return view('groups.showGuest', $responseArray);
        }

    }


    // If the user is logged in, and a member of the group, return a list of articles in the group and the submit form.
        public function returnGroupContent(Group $group, Request $request){

        $user = $request->user(); // Gets user from request
        $group->load('articles'); // eager loads all articles associated with the group.

        if($this->isGroupMember($user,$group)){
            $responseArray = ["user" => $user, "group" => $group];
            return view('groups.groupsContent', $responseArray);
        } else{
            $responseArray = ["user" => $user, "group" => $group];
            return view('groups.showGuest', $responseArray);
        }

    }

    // Creates a new user membership given the group id and current user.
    // Please note that the form in home.blade.php needs to include the specific group ID for this to work.
    // A future plan is to have each group have a editable secret key to give temporary access
    public function store(Request $request){
        $user = $request->user();
        $group_id = $request->group_id; // Gets the integer id from the form

        $group = Group::find($group_id); // Gets the actual Group object from database

        if(!($this->isGroupMember($user, $group))){ // Creates new membership if it doesn't exist.
            $membership = new Membership();
            $membership->user_id = $user->id;
            $membership->group_id = $group_id;
            $membership->user_role = 1;
            $membership->save();
        }
        return back();
    }

    // Test is a dirty demo function.
    // For a given user, adds them to ALL currently avaliable groups.
    public function storeAll(Request $request){
        $user = $request->user();
        $groups = Group::all();

        foreach($groups as $group){
            if(!($this->isGroupMember($user, $group))){ // Creates new membership if it doesn't exist.
                $membership = new Membership();
                $membership->user_id = $user->id;
                $membership->group_id = $group->id;
                $membership->user_role = 1;
                $membership->save();
            }
        }
        return back();
    }


    // This is how we check if a given user is a member of the group
    // Duplicated function in CommentsController because I didn't figure out the
    // external classes thing properly.
    // Additional validation can be added by adding the (&& (user_role == "teacher") ) condition
    function isGroupMember($user, $group){
        $groupId = $group->id;
        $memberships = $user->memberships;

        $permission = false;

        foreach($memberships as $membership){
            if($groupId === $membership->group_id){
                $permission = true;
                break;
            }
        }
        return $permission;
    }
}
