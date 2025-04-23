@extends('Visiteur.master')

@section('content')

<style>
    /* Consistent scrollbar styling */
    .scroll-beautiful::-webkit-scrollbar {
        width: 8px;
    }

    .scroll-beautiful::-webkit-scrollbar-track {
        background: #fef3c7;
        border-radius: 10px;
    }

    .scroll-beautiful::-webkit-scrollbar-thumb {
        background-color: #d97706;
        border-radius: 10px;
        border: 2px solid #fef3c7;
    }

    .scroll-beautiful {
        scrollbar-color: #d97706 #fef3c7;
        scrollbar-width: thin;
    }

    /* Consistent hover animations */
    .hover-scale {
        transition: all 0.3s ease;
    }

    .hover-scale:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    /* Consistent section styling */
    .content-section {
        padding: 4rem 0;
    }

    /* Consistent card styling */
    .card {
        background-color: #fef3c7;
        border: 1px solid #fcd34d;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    /* Consistent heading styling */
    .section-heading {
        font-family: serif;
        font-weight: bold;
        color: #92400e;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #fcd34d;
    }

    /* Consistent button styling */
    .btn-primary {
        background: linear-gradient(to right, #92400e, #b45309);
        color: #fef3c7;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(to right, #b45309, #d97706);
    }

    .btn-secondary {
        background: linear-gradient(to right, #fef3c7, #fde68a);
        color: #92400e;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: linear-gradient(to right, #fde68a, #fcd34d);
    }
</style>

<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen scroll-beautiful">

    <!-- Favorites Content Section -->
    <section class="content-section">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Card -->
            <div class="card mb-10">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-amber-800 mb-6 font-serif">
                            Mes Articles Favoris
                        </h1>
                        <p class="text-xl text-amber-700 mb-4 max-w-3xl mx-auto">
                            Découvrez votre collection personnelle d'articles fascinants de l'histoire
                        </p>
                        <div class="flex justify-center space-x-4 text-amber-700 text-sm mb-6">
                            <span><i class="fas fa-bookmark mr-2"></i>{{ count($favorites) }} articles sauvegardés</span>
                            <span><i class="fas fa-user mr-2"></i>{{ auth()->user()->name }}</span>
                        </div>
                    </div>

                    <h3 class="section-heading text-2xl">
                        <i class="fas fa-star mr-2 text-yellow-500"></i> Vos Articles Favoris
                    </h3>

                    <!-- Flash Messages -->
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <!-- Favorites List -->
                    <div class="space-y-6 mb-8 max-h-full pr-2 scroll-beautiful">
                        @forelse($favorites as $favorite)
                            <div class="bg-amber-50 p-4 rounded-lg border border-amber-200 hover-scale">
                                <div class="flex flex-col md:flex-row justify-between">
                                    <div class="md:w-2/3">
                                        <h4 class="text-xl font-semibold text-amber-900 mb-2">
                                            <a href="{{ route('articles.show', $favorite->article->id) }}" class="hover:text-amber-700">
                                                {{ $favorite->article->title }}
                                            </a>
                                        </h4>
                                        <p class="text-amber-800 mb-4 line-clamp-2">{{ $favorite->article->description }}</p>
                                        <div class="flex flex-wrap gap-4 text-amber-700 text-sm mb-3">
                                            <span><i class="fas fa-clock mr-2"></i>{{ \Carbon\Carbon::parse($favorite->article->date_publication)->format('F d, Y') }}</span>
                                            <span><i class="fas fa-user mr-2"></i>{{ $favorite->article->utilisateur->name ?? 'Auteur inconnu' }}</span>
                                            <span><i class="fas fa-tag mr-2"></i>{{ $favorite->article->category->name ?? 'Catégorie inconnue' }}</span>
                                        </div>
                                        <div class="flex flex-wrap gap-4 mt-4">
                                            <a href="{{ route('articles.show', $favorite->article->id) }}" class="btn-primary">
                                                <i class="fas fa-book-open mr-2"></i> Lire l'article
                                            </a>
                                            <form action="{{ route('favorites.toggle', $favorite->article->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="flex items-center gap-2 text-amber-700 hover:text-white font-semibold px-4 py-2 rounded border border-amber-400 bg-white hover:bg-amber-500 transition-all duration-300">
                                                    <i class="fas fa-star text-yellow-400"></i>
                                                    Retirer des favoris
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="md:w-1/3 flex justify-center items-center mt-4 md:mt-0">
                                        @if($favorite->article->images && count($favorite->article->images) > 0)
                                            <img src="{{ $favorite->article->images[0]->path }}" alt="{{ $favorite->article->title }}" class="w-full h-40 object-cover rounded-lg border border-amber-300 shadow-sm">
                                        @else
                                            <div class="w-full h-40 bg-amber-200 rounded-lg border border-amber-300 shadow-sm flex items-center justify-center">
                                                <i class="fas fa-scroll text-5xl text-amber-700"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-4 pt-4 border-t border-amber-200 text-sm text-amber-700">
                                    <span><i class="fas fa-calendar-plus mr-2"></i>Ajouté aux favoris le: {{ \Carbon\Carbon::parse($favorite->date_creation)->format('F d, Y') }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-16">
                                <div class="mb-6 text-amber-700">
                                    <i class="fas fa-star text-5xl opacity-30"></i>
                                </div>
                                <h4 class="text-xl font-semibold text-amber-900 mb-4">Vous n'avez pas encore d'articles favoris</h4>
                                <p class="text-amber-800 mb-8">Parcourez nos articles et ajoutez-les à vos favoris pour les retrouver facilement ici</p>
                                <a href="{{ route('articles.index') }}" class="btn-primary px-6 py-3">
                                    <i class="fas fa-search mr-2"></i> Découvrir des articles
                                </a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if(count($favorites) > 0 && $favorites instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="mt-8 pt-6 border-t border-amber-200">
                            <div class="flex justify-center">
                                {{ $favorites->links('pagination::tailwind') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Filter Section -->
            <div class="card mb-10">
                <div class="p-8">
                    <h3 class="section-heading text-xl">
                        <i class="fas fa-filter mr-2"></i> Filtrer vos favoris
                    </h3>
                    <form action="{{ route('favorites.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="category" class="block text-amber-800 mb-2">Catégorie</label>
                            <select name="category" id="category" class="w-full bg-amber-50 border border-amber-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                                <option value="">Toutes les catégories</option>
                                @foreach($categories ?? [] as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="date" class="block text-amber-800 mb-2">Trier par</label>
                            <select name="sort" id="sort" class="w-full bg-amber-50 border border-amber-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Date d'ajout (récent)</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Date d'ajout (ancien)</option>
                                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>Titre (A-Z)</option>
                                <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>Titre (Z-A)</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full btn-primary">
                                <i class="fas fa-search mr-2"></i> Appliquer les filtres
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Recommended Articles Section -->
    <section class="content-section bg-amber-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold text-amber-900 mb-6 font-serif text-center section-heading border-0">Articles Recommandés</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($recommendedArticles ?? [] as $article)
                    <div class="card hover-scale">
                        <div class="h-48 overflow-hidden">
                            @if($article->images && count($article->images) > 0)
                                <img src="{{ $article->images[0]->path }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-amber-200 flex items-center justify-center">
                                    <i class="fas fa-book text-5xl text-amber-700"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h4 class="text-lg font-semibold text-amber-900 mb-2 line-clamp-1">{{ $article->title }}</h4>
                            <p class="text-amber-800 mb-4 text-sm line-clamp-2">{{ $article->description }}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('articles.show', $article->id) }}" class="text-amber-700 hover:text-amber-900 font-semibold text-sm">
                                    Lire plus <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                                <form action="{{ route('favorites.toggle', $article->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-amber-700 hover:text-amber-900">
                                        <i class="fas fa-star {{ auth()->user()->favorites->contains('article_id', $article->id) ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="content-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-3xl font-bold text-amber-900 mb-4 font-serif">Continuez Votre Voyage Historique</h3>
            <p class="text-amber-800 mb-8 max-w-2xl mx-auto">Rejoignez notre communauté de passionnés d'histoire et découvrez plus d'histoires fascinantes du passé</p>
            <div class="space-x-4">
                <a href="#" class="btn-primary px-8 py-3 hover-scale inline-block shadow-lg">Devenir Membre</a>
                <a href="{{ route('articles.index') }}" class="btn-secondary px-8 py-3 hover-scale inline-block shadow-lg">Parcourir Plus d'Articles</a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let deleteButtons = document.querySelectorAll('.delete-favorite-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm('Êtes-vous sûr de vouloir retirer cet article de vos favoris?')) {
                        e.preventDefault();
                    }
                });
            });

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
@endsection
