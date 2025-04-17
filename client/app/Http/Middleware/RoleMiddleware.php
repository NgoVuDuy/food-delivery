<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        if ($role == 'shipper') {
            // Nếu không phải là shipper
            if (empty(session('user')['shipper'])) {

                abort(404);
            }
        }

        if ($role == 'staff') {
            // Nếu không phải là staff
            if (empty(session('user')['staff'])) {

                abort(404);
            }
        }

        if ($role == 'user') {
            // Nếu không phải là user
            if (!empty(session('user')['staff']) || !empty(session('user')['shipper'])) {

                abort(404);
            }
        }

        if ($role == 'not_user') {
            // Nếu không phải là user
            if (empty(session('user')['staff']) && empty(session('user')['shipper'])) {

                abort(404);
            }
        }

        return $next($request);
    }
}
