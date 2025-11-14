<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Affiche la liste de tous les posts
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Enregistre un nouveau post
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'nullable|string|unique:posts,slug'
        ]);

        // Génère le slug si non fourni
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $post = Post::create($validated);
        return redirect()->route('posts.show', ['slug' => $post->slug, 'id' => $post->id])
            ->with('success', 'Post créé avec succès!');
    }

    /**
     * Affiche un post spécifique
     */
    public function show($slug, $id)
    {
        $post = Post::findOrFail($id);
        
        // Redirige si le slug ne correspond pas
        if ($post->slug !== $slug) {
            return redirect()->route('posts.show', ['slug' => $post->slug, 'id' => $post->id], 301);
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Met à jour un post
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'nullable|string|unique:posts,slug,' . $post->id
        ]);

        // Génère le slug si non fourni
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $post->update($validated);

        return redirect()->route('posts.show', ['slug' => $post->slug, 'id' => $post->id])
            ->with('success', 'Post modifié avec succès!');
    }

    /**
     * Supprime un post
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post supprimé avec succès!');
    }
}
