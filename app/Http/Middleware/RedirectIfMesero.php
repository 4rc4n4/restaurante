<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfMesero
{
    public function handle(Request $request, Closure $next)
{
    if (auth()->check() && auth()->user()->roles->contains('name', 'mesero')) {
        if ($request->path() !== 'ventas/puntov') {
            return redirect('/ventas/puntov');
        }
    }

    return $next($request);
}

}
