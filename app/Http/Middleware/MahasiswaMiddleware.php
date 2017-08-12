<?php

namespace App\Http\Middleware;

use Closure;

class MahasiswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $user = $request->user();

      if ($user){
        if ($user->isMahasiswa()){
          return $next($request);
        }
      }
      return abort(404);
    }
}
