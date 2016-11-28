<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // Tests if the user is an admin
    // Continues if yes
    // Throws an abort if no (later.);
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if($user->user_type == "admin"){
            return $next($request);
        }
        else{
            abort(404, 'damn');
        }

    }
}
