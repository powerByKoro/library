<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request){
            $user = $request->all();
            $admin = DB::table('users')
                ->where('email','=', 'admin@library.lib')
                ->first();

            if(($user['login'] == $admin->email) and ($user['password'] == $admin->password)){
                return $next($request);
            }else{
                return back();
            }
        }else{
            return back();
        }


    }
}
