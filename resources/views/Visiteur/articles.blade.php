@extends('Visiteur.master')
@section('content')
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">

    <!-- Article Hero Section -->
    <div class="relative pt-16 pb-24 flex content-center items-center justify-center">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://i.pinimg.com/originals/56/c3/45/56c345c29b5179d85891b1500fccc8e9.gif');">
            <span class="w-full h-full absolute opacity-50 bg-amber-900"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="w-full px-4 ml-auto mr-auto text-center">
                    <div class="floating mt-[3rem]">
                        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-amber-100 mb-6 font-serif">
                            {{ $article->title }}
                        </h1>
                        <p class="text-xl text-amber-200 mb-4 max-w-3xl mx-auto">
                            {{ $article->description }}
                        </p>
                        <div class="flex justify-center space-x-4 text-amber-200 text-sm mb-6">
                            <span><i class="fas fa-clock mr-2"></i>{{ \Carbon\Carbon::parse($article->date_publication)->format('F d, Y') }}</span>
                            <span><i class="fas fa-user mr-2"></i>{{ $article->utilisateur->name ?? 'Auteur inconnu' }}</span>
                            <span><i class="fas fa-tag mr-2"></i>{{ $article->category->name ?? 'Catégorie inconnue' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content Section -->
    <section class="py-16 parchment">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-amber-100 rounded-lg shadow-lg overflow-hidden border border-amber-200 mb-10">
                <br>
                <h3 class="text-2xl font-bold text-amber-900 mb-4 font-serif"> {{ $article->title }} :</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-6">
                    @foreach($article->images as $image)
                    <img src="{{ $image->path }}" alt="Article Image">

                    @endforeach
                </div>
                <!-- Display a placeholder image if no images are available -->
                {{-- <img src="https://via.placeholder.com/800x400?text=No+Image+Available" alt="{{ $article->title }}" class="w-full h-72 object-cover"/> --}}


                {{-- <img src="{{$image->path}}" alt="{{ $article->title }}" class="w-full h-72 object-cover"/> --}}

                <div class="p-8">
                    <div class="prose prose-amber max-w-none text-amber-900">
                        {!! $article->content !!}
                    </div>

                    <!-- Time Period Context -->
                    <div class="mt-12 bg-amber-50 p-6 rounded-lg border border-amber-200">
                        <h3 class="text-2xl font-bold text-amber-900 mb-4 font-serif">Historical Context</h3>
                        <p class="text-amber-800">{{ $article->historical_context ?? 'This event took place during a pivotal moment in history, influencing various aspects of society, culture, and politics of the era.' }}</p>
                    </div>

                    <!-- Key Figures -->
                    @if(isset($article->key_figures) && count($article->key_figures) > 0)
                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-amber-900 mb-4 font-serif">Key Historical Figures</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($article->key_figures as $figure)
                            <div class="bg-amber-50 p-4 rounded-lg border border-amber-200">
                                <h4 class="text-lg font-semibold text-amber-900">{{ $figure->name }}</h4>
                                <p class="text-amber-800">{{ $figure->description }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Timeline -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-amber-900 mb-4 font-serif">Timeline of Events</h3>
                        <div class="relative">
                            <div class="absolute left-0 w-1 bg-amber-300 h-full"></div>
                            @for($i = 1; $i <= 3; $i++)
                            <div class="ml-8 relative mb-8">
                                <div class="absolute -left-10 w-5 h-5 rounded-full bg-amber-600 border-4 border-amber-100"></div>
                                <div class="bg-amber-50 p-4 rounded-lg border border-amber-200">
                                    <h4 class="text-lg font-semibold text-amber-900">Event {{ $i }}</h4>
                                    <p class="text-sm text-amber-600">{{ date('F Y', strtotime("-".($i*5)." months")) }}</p>
                                    <p class="text-amber-800 mt-2">A significant development related to this historical event that shaped its course.</p>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Sources -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-amber-900 mb-4 font-serif">Sources & References</h3>
                        <ul class="list-disc pl-5 text-amber-800">
                            @for($i = 1; $i <= 3; $i++)
                            <li class="mb-2">Historical reference {{ $i }}: "{{ $article->title }} and Its Impact", Journal of Historical Studies</li>
                            @endfor
                        </ul>
                    </div>

                    <!-- Navigation and Social -->
                    <div class="mt-12 flex flex-col md:flex-row justify-between items-center pt-6 border-t border-amber-200">
                        <div class="flex space-x-4">
                            <a href="{{ url()->previous() }}" class="inline-block bg-amber-700 text-amber-100 px-4 py-2 rounded-lg font-semibold hover:bg-amber-600 transition-all duration-300">
                                <i class="fas fa-arrow-left mr-2"></i> Back to Articles
                            </a>
                        </div>
                        <div class="flex space-x-3 mt-4 md:mt-0">
                            <span class="text-amber-800">Share this article:</span>
                            <a href="#" class="text-amber-700 hover:text-amber-500"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-amber-700 hover:text-amber-500"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-amber-700 hover:text-amber-500"><i class="fab fa-pinterest"></i></a>
                            <a href="#" class="text-amber-700 hover:text-amber-500"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Call to Action Section -->
    <section class="py-16 parchment">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-3xl font-bold text-amber-900 mb-4 font-serif">Continue Your Historical Journey</h3>
            <p class="text-amber-800 mb-8 max-w-2xl mx-auto">Join our community of history enthusiasts and discover more fascinating stories from the past</p>
            <div class="space-x-4">
                <a href="#" class="inline-block bg-gradient-to-r from-amber-700 to-amber-600 text-amber-100 px-8 py-3 rounded-lg font-semibold hover:from-amber-600 hover:to-amber-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Become a Member
                </a>
                <a href="#" class="inline-block bg-gradient-to-r from-amber-100 to-amber-200 text-amber-900 px-8 py-3 rounded-lg font-semibold hover:from-amber-200 hover:to-amber-300 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Browse More Articles
                </a>
            </div>
        </div>
    </section>
@endsection
</body>
</html>
