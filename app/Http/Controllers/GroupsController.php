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
    public function show(Group $group){
        $group->load('articles','memberships.user');
        return view('groups.show', compact('group'));
    }
}
