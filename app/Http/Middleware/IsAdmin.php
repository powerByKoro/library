<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        /* @var $user User */
        $user = $request->user();

        if (!$user->is_admin) {
            return back();
        }

        return $next($request);
    }
}
