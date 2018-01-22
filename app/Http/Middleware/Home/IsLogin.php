<?php

namespace App\Http\Middleware\Home;

use Closure;

class IsLogin
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
        if(Session('home_user'))
        {   
            return $next($request);
        }else{

            return redirect('home/login/index')->with(['info'=>'请登录']);
        }
        
    }
}
