@extends('base')

@section('title', 'Créer un article')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800">← Retour à la liste</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Créer un nouvel article</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Titre *</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    required
                >
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug (optionnel)</label>
                <input 
                    type="text" 
                    name="slug" 
                    id="slug" 
                    value="{{ old('slug') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                    placeholder="Sera généré automatiquement si vide"
                >
                @error('slug')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-sm mt-1">Le slug sera généré automatiquement à partir du titre si vous le laissez vide.</p>
            </div>

            <div class="mb-6">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Contenu *</label>
                <textarea 
                    name="content" 
                    id="content" 
                    rows="10"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('content') border-red-500 @enderror"
                    required
                >{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('posts.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Créer l'article
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
