<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Group;
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


    // Finds the Group associated with the id
    // Calls the group/show view
    public function show(Group $group, Request $request){

        $user = $request->user();
        $group->load('articles');

        if($this->isGroupMember($user,$group)){
            return view('groups.show', compact('group'));
        } else{
            return view('groups.showGuest', compact('group'));
        }


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
