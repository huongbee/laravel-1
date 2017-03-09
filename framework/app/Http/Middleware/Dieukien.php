<?php

namespace App\Http\Middleware;

use Closure;

class Dieukien
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
        //
        if($request->input('tuoi') > 20){
          return $next($request);
        }
        else{
          return redirect()->route('kiem-tra-middleware');
        }
    }
}
