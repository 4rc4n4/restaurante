<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || !$request->user()->roles->contains('name', $role)) {
            return redirect('welcome')->with('error', 'No tienes acceso a esta sección.');
        }

        return $next($request);
    }
}
