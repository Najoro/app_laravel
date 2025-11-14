@extends('base')

@section('title', 'Modifier l\'article')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('posts.show', ['slug' => $post->slug, 'id' => $post->id]) }}" class="text-blue-600 hover:text-blue-800">← Retour à l'article</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Modifier l'article</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Titre *</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title', $post->title) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    required
                >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
                <input 
                    type="text" 
                    name="slug" 
                    id="slug" 
                    value="{{ old('slug', $post->slug) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                >
                @error('slug')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Contenu *</label>
                <textarea 
                    name="content" 
                    id="content" 
                    rows="10"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror"
                    required
                >{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('posts.show', ['slug' => $post->slug, 'id' => $post->id]) }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
