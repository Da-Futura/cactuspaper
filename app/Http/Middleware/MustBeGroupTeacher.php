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

    // Not sure how to get the group id into the request to test
    public function handle($request, Closure $next)
    {
        if($userMembershipType === "teacher"){
            return $next($request);
        }else{
            abort(404, 'damn');
        }
    }
}
