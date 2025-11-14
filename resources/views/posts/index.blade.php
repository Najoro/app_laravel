@extends('base')

@section('title', 'Liste des articles')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Tous les articles</h1>
    <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
        + Créer un article
    </a>
</div>

@if($posts->count() > 0)
    <div class="grid gap-6">
        @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                            <a href="{{ route('posts.show', ['slug' => $post->slug, 'id' => $post->id]) }}" class="hover:text-blue-600">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 200) }}</p>
                        <div class="text-sm text-gray-500">
                            Publié le {{ $post->created_at->format('d/m/Y à H:i') }}
                        </div>
                    </div>
                    <div class="flex space-x-2 ml-4">
                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                            Modifier
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@else
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <p class="text-gray-600 text-lg mb-4">Aucun article pour le moment.</p>
        <a href="{{ route('posts.create') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            Créer le premier article
        </a>
    </div>
@endif
@endsection
