@extends('Visiteur.master')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-semibold text-amber-800 text-center mb-10 font-serif">
        Résultats de recherche
    </h2>

    @if($articles->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <div class="bg-white rounded-md shadow-sm overflow-hidden border border-gray-100 hover:shadow-lg transition-all">
                    <div class="h-48 overflow-hidden relative">
                        @if($article->images && count($article->images) > 0)
                            <img src="{{ $article->images[0]->path }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-amber-200 flex items-center justify-center">
                                <i class="fas fa-book text-5xl text-amber-700"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-amber-900 mb-2 line-clamp-1">{{ $article->title }}</h3>
                        <p class="text-sm text-amber-800 mb-3 line-clamp-2">{{ $article->description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">{{ $article->date }}</span>
                            <a href="/article/{{ $article->id }}" class="text-amber-700 hover:text-amber-900 text-sm font-medium flex items-center">
                                Lire plus <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 flex justify-center">
            {{ $articles->links('pagination::simple-tailwind') }}
        </div>
    @else
        <p class="text-center text-gray-600 text-lg">Aucun résultat trouvé pour votre recherche.</p>
    @endif
</div>
@endsection
