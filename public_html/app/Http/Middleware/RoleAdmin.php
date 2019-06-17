<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleAdmin
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
        
        
             if (Auth::check()&&Auth::user()->id==1) {
           return $next($request);
        }
        echo '<script type="text/javascript">
                alert("Bạn không được vào trang này.");
                window.location="';
                echo route('getadmin');
                echo '"
                </script>'; 
        // return redirect('/admin');
    
        
       }
}
