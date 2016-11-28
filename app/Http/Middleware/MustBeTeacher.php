<?php

namespace App\Http\Middleware;

use Closure;

class MustBeTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // Tests if the user is an teacher
    // Continues if yes
    // Throws an abort if no (later.);
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if($user->user_type == "teacher"){
            return $next($request);
        }
        else{
            abort(404, 'damn');
        }

    }
}
