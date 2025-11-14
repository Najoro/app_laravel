<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/welcome', function () {
    return view('welcome');
});

// Route principale avec redirection conditionnelle
Route::get("/", [DashboardController::class, 'index'])->middleware(['auth', 'role.redirect']);

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Dashboard utilisateur normal
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return redirect('/admin');
        }
        return view('dashboard.user', compact('user'));
    })->name('dashboard');
    
    // Route admin (sera gérée par Filament)
    Route::get('/admin-dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
});


Route::prefix('blog')->name('blog.')->controller(TestController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{id}', 'show')
    ->where([
        "id"=> "[0-9]+",
        "slug"=>"[a-z0-9\-]+"
    ])
    ->name('show');
}); 

// Routes CRUD pour les posts
Route::prefix('posts')->name('posts.')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{slug}-{id}', 'show')
        ->where([
            'id' => '[0-9]+',
            'slug' => '[a-z0-9\-]+'
        ])
        ->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});