<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Sigurohemi që përdoruesi është i autentikuar
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $user = Auth::user();

        // Lejojmë adminin të ketë akses në çdo route
        if ($user->role->name === 'Admin') {
            return $next($request);
        }

        // Kontrollojmë nëse përdoruesi ka njërin nga rolet e lejuara
        if (!in_array($user->role->name, $roles)) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        return $next($request);
    }
}
