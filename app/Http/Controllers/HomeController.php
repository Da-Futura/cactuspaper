<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // includes middleware which restricts access to logged in users.
    // redirects to login otherwise
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // returns the users dashboard page.
    // It displays their current groups, and the ability to add new ones.
    public function index(Request $request)
    {
        $user = $request->user();
        $userGroups = $this->getGroupArray($user);
        $responseArray = ["user" => $user, "userGroups" => $userGroups];
        return view('home', $responseArray);
    }



    // returns the users dashboard content partial.
    // It displays their current groups, and the ability to add new ones.
    public function homeContent(Request $request)
    {
        $user = $request->user();
        $userGroups = $this->getGroupArray($user);
        $responseArray = ["user" => $user, "userGroups" => $userGroups];
        return view('homeContent', $responseArray);
    }


    // Returns an array of Group Objects given a user.
    function getGroupArray($user){
        $memberships = $user->memberships;
        $array = [];

        foreach($memberships as $membership){
            $group = $membership->group;
            array_push($array, $group);
        }
        return $array;
    }
}
