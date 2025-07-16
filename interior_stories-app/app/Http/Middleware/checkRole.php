<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class checkRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $roles = ['admin', 'customer'];
        $user = $request->user();

        if (!$user || !in_array($user->role, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    } 
}



// Nouveau middleware à créer pour vérifier que l'admin est connecté