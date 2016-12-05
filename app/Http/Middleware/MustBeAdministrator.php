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


    // Middleware works by checking something, and then passing the request on to the
    // next middleware until it finally reaches the controller.

    // Tests if the user is an admin
    // Continues if yes
    // Throws an abort if no (This is really ugly,a nd I should make an error view);
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
