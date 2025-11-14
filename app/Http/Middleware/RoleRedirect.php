<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            /** @var User $user */
            $user = Auth::user();
            
            // Si l'utilisateur est admin, rediriger vers l'admin panel
            if ($user->isAdmin()) {
                return redirect('/admin');
            }
            
            // Si l'utilisateur est un user normal, rediriger vers le dashboard user
            if ($user->isUser()) {
                return redirect('/dashboard');
            }
        }
        
        return $next($request);
    }
}
