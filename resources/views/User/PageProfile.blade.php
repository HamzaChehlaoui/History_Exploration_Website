@extends('Visiteur.master')

@section('content')
<body>
<style>
    .timeline-track {
        background: repeating-linear-gradient(
            45deg,
            #92400e,
            #92400e 10px,
            #78350f 10px,
            #78350f 20px
        );
    }

    .parchment {
        background-color: #fffbeb;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23b45309' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    .scroll-trigger {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease-out;
    }

    .scroll-trigger.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .time-badge {
        background: conic-gradient(from 0deg, #78350f, #b45309, #92400e, #78350f);
    }

    .favorite-button {
        transition: all 0.3s ease;
    }

    .favorite-button:hover {
        transform: scale(1.1);
    }

    .favorite-button.active svg {
        fill: #b45309;
        color: #b45309;
    }
</style>

<!-- Profile Header Section -->
<section class="relative h-80 bg-cover bg-center bg-no-repeat" style="background-image: url('https://www.pcworld.com/wp-content/uploads/2023/09/AssassinsCreedMirage_01_Aufmacher.jpg?quality=50&strip=all');">
    <div class="absolute inset-0 bg-amber-900/60"></div>
    <div class="absolute bottom-0 left-0 w-full px-4 pb-6">
        <div class="max-w-6xl mx-auto flex items-end gap-6">
            <div class="relative">
                <div class="h-36 w-36 rounded-full border-4 border-amber-100 overflow-hidden shadow-lg">
                    <img src="{{ $user->profileImage ? $user->profileImage : 'https://www.pcworld.com/wp-content/uploads/2023/09/AssassinsCreedMirage_01_Aufmacher.jpg?quality=50&strip=all' }}" alt="Profile Picture" class="h-full w-full object-cover">
    </div>
            </div>
            <div class="flex flex-col justify-end">
                <h1 class="text-3xl font-bold text-amber-100">{{ $user->name }}</h1>
                <p class="text-amber-100">{{ $user->email }}</p>
                @if ($isOwnProfile)
                <a href="{{ route('edit.profile') }}" class="mt-2 inline-block px-4 py-2 bg-amber-700 text-white rounded-md hover:bg-amber-800 transition-colors text-sm">Edit Profile</a>
                @endif
            </div>
        </div>
    </div>
</section>


<!-- Main Profile Content -->
<div class="max-w-6xl mx-auto px-4 pt-24 pb-16 grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Sidebar -->
    <div class="lg:col-span-1">
        <div class="bg-amber-100 rounded-lg shadow-md border border-amber-200 p-6 mb-8">
            <h3 class="text-xl font-semibold text-amber-900 mb-4">About Me</h3>
            <p class="text-amber-800 mb-4">
                {{ $user->bio ?? 'TimeTrekker member with a passion for history.' }}
            </p>

            <h4 class="text-lg font-semibold text-amber-900 mb-2 mt-6">Member Stats</h4>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="text-amber-700">Articles:</span>
                    <span class="font-medium text-amber-900">{{ $stats['articlesCount'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-amber-700">Favorites:</span>
                    <span class="font-medium text-amber-900">{{ $stats['favoritesCount'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-amber-700">Member Since:</span>
                    <span class="font-medium text-amber-900">@if($user->birth_date)
                        {{ $user->birth_date->format('M Y') }}
                    @else
                        <span>Date of birth not specified</span>
                    @endif </span>
                </div>
            </div>

            @if ($isOwnProfile)
            <div class="mt-8 pt-6 border-t border-amber-200">
                <h4 class="text-lg font-semibold text-amber-900 mb-4">Account Options</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('edit.profile') }}" class="flex items-center text-amber-700 hover:text-amber-900">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Profile
                    </a></li>
                    <li><a href="/favorites" class="flex items-center text-amber-700 hover:text-amber-900">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        View All Favorites
                    </a></li>
                    <li><a href="{{ route('article.create') }}" class="flex items-center text-amber-700 hover:text-amber-900">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Create New Article
                    </a></li>
                </ul>
            </div>
            @else
            <div class="mt-8 pt-6 border-t border-amber-200">
                <h4 class="text-lg font-semibold text-amber-900 mb-4">Contact</h4>
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="h-5 w-5 text-amber-700" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                    <a href="mailto:{{ $user->email }}" class="text-amber-700 hover:text-amber-900">{{ $user->email }}</a>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="lg:col-span-2">
        <!-- Favorite Articles Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-amber-900 mb-6">Favorite Articles</h2>
            <div class="relative">
                <!-- Timeline Track -->
                <div class="absolute left-3 top-0 w-2 h-full timeline-track rounded-full"></div>

                <!-- Timeline Events (Favorite Articles) -->
                <div class="space-y-12">
                    @if ($favoriteArticles->isNotEmpty())
                        @foreach ($favoriteArticles as $index => $article)
                        <!-- Timeline Event -->
                        <div class="relative pl-12 scroll-trigger">
                            <div class="absolute left-0 w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center">
                                <span class="text-amber-100 font-bold">{{ $index + 1 }}</span>
                            </div>
                            <div class="parchment p-5 rounded-lg shadow-md border border-amber-300">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-xl font-semibold text-amber-900">{{ $article->title }}</h3>
                                    <span class="px-3 py-1 bg-amber-200 text-amber-800 rounded-full text-sm">{{ $article->created_at->format('Y') }}</span>
                                </div>
                                <p class="text-amber-800 mb-4">
                                    {{ Str::limit($article->content, 150) }}
                                </p>

                                @if ($article->images->count() > 0)
                                <div class="flex flex-wrap gap-4">
                                    @foreach ($article->images->take(2) as $image)
                                    <img src="{{  $image->path }}" alt="{{ $article->title }}" class="h-24 w-32 object-cover rounded-md">
                                    @endforeach
                                </div>
                                @endif

                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('articles.show', $article->id) }}" class="text-amber-700 hover:text-amber-900 font-medium">
                                        Read more →
                                    </a>
                                    <div class="flex items-center">
                                        <span class="text-amber-700 text-sm mr-2">By {{ $article->utilisateur->name }}</span>
                                        @if (Auth::check())
                                        <button
                                            class="favorite-button {{ Auth::user()->favorites->contains('article_id', $article->id) ? 'active' : '' }}"
                                            data-article-id="{{ $article->id }}"
                                            onclick="toggleFavorite({{ $article->id }})">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- View All Favorites -->
                        <div class="relative pl-12 text-center mt-8">
                            <a href="/favorites" class="inline-block px-6 py-3 bg-amber-700 text-amber-100 rounded-md hover:bg-amber-800 transition-colors">
                                View All Favorites
                            </a>
                        </div>

                    @else
                        <!-- No Favorites Message -->
                        <div class="relative pl-12 scroll-trigger">
                            <div class="absolute left-0 w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center">
                                <span class="text-amber-100 font-bold">!</span>
                            </div>
                            <div class="parchment p-5 rounded-lg shadow-md border border-amber-300">
                                <p class="text-amber-800">
                                    No favorite articles yet. Explore the timeline to discover and save articles that interest you!
                                </p>
                                <a href="/" class="mt-3 inline-block px-4 py-2 bg-amber-700 text-amber-100 rounded-md hover:bg-amber-800 transition-colors">
                                    Explore Articles
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
</body>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let scrollTriggers = document.querySelectorAll('.scroll-trigger');

        let checkVisibility = () => {
            scrollTriggers.forEach(element => {
                let position = element.getBoundingClientRect();

                if(position.top < window.innerHeight - 100) {
                    element.classList.add('visible');
                }
            });
        };

        checkVisibility();
        window.addEventListener('scroll', checkVisibility);
    });

    function toggleFavorite(articleId) {
    fetch('{{ route("profile.toggleFavorite", ":articleId") }}'.replace(':articleId', articleId), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            article_id: articleId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const button = document.querySelector(`.favorite-button[data-article-id="${articleId}"]`);
            if (data.isFavorite) {
                button.classList.add('active');
            } else {
                button.classList.remove('active');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

</script>
</html>
