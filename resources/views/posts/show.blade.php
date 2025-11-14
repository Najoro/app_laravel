@extends('base')

@section('title', $post->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800">← Retour à la liste</a>
    </div>

    <article class="bg-white rounded-lg shadow-md p-8">
        <header class="mb-6 border-b pb-6">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
            <div class="flex justify-between items-center">
                <div class="text-gray-600">
                    <p class="text-sm">Publié le {{ $post->created_at->format('d/m/Y à H:i') }}</p>
                    @if($post->updated_at != $post->created_at)
                        <p class="text-sm">Modifié le {{ $post->updated_at->format('d/m/Y à H:i') }}</p>
                    @endif
                </div>
                <div class="flex space-x-2">
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
        </header>

        <div class="prose prose-lg max-w-none">
            <div class="text-gray-800 leading-relaxed whitespace-pre-line">{{ $post->content }}</div>
        </div>
    </article>
</div>
@endsection
