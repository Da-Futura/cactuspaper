<?php

namespace App\Http\Middleware;

use Closure;

class MustBeGroupTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    // Middleware works by checking something, and then passing the request on to the
    // next middleware until it finally reaches the controller.

    // Not sure how to get the group id into the request to test if it's a teacher of a specific group
    // authentication could be done in controller though.
    // see isGroupMember function in CommentsController and GroupsController
    public function handle($request, Closure $next)
    {
        if($userMembershipType === "teacher"){
            return $next($request);
        }else{
            abort(404, 'damn'); // This is ugly and I should make an error view
        }
    }
}
