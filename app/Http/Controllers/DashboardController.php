<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        
        // Redirection conditionnelle selon le rôle
        if ($user->isAdmin()) {
            return redirect('/admin');
        }
        
        // Dashboard pour les utilisateurs normaux
        return view('dashboard.user', compact('user'));
    }
    
    /**
     * Show admin dashboard (alternative route)
     */
    public function admin()
    {
        /** @var User $user */
        $user = Auth::user();
        
        if (!$user->isAdmin()) {
            abort(403, 'Accès non autorisé');
        }
        
        return view('dashboard.admin', compact('user'));
    }
}
