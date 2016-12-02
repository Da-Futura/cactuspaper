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
    // Else, redirect to group.showGuest which doesn't give them access.
    public function show(Group $group, Request $request){

        $user = $request->user();
        $group->load('articles');

        if($this->isGroupMember($user,$group)){
            $responseArray = ["user" => $user, "group" => $group];
            return view('groups.show', $responseArray);
        } else{
            return view('groups.showGuest', compact('group'));
        }

    }

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


    //This is how we check if a given user is a member of the group
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
