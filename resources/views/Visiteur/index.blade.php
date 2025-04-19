@extends('Visiteur.master')
@section('content')
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Hero Section -->
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="background-image: url('https://img.le-dictionnaire.com/histoire-temps.jpg');">
            <span class="w-full h-full absolute opacity-50 bg-amber-900"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="floating">
                        <h1 class="text-5xl sm:text-6xl md:text-7xl font-bold text-amber-100 mb-6 font-serif">
                            Where Time Becomes
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-200 to-amber-400">Adventure</span>
                        </h1>
                        <p class="text-xl text-amber-200 mb-8 max-w-2xl mx-auto">
                            Step through the portals of time and witness history unfold before your eyes
                        </p>
                        <div class="space-x-4">
                            <a href="#" class="inline-block bg-gradient-to-r from-amber-700 to-amber-600 text-amber-100 px-8 py-3 rounded-lg font-semibold hover:from-amber-600 hover:to-amber-500 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Begin Your Journey
                            </a>
                            <a href="#" class="inline-block bg-gradient-to-r from-amber-100 to-amber-200 text-amber-900 px-8 py-3 rounded-lg font-semibold hover:from-amber-200 hover:to-amber-300 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Join Our Community
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Historical Events Section -->
    <section class="py-16 parchment">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-3xl font-bold text-amber-900 mb-8 text-center font-serif">Pivotal Moments in History</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Event Cards with vintage styling -->
                @foreach($articles as $article)
    <div class="bg-amber-100 rounded-lg shadow-md overflow-hidden border border-amber-200 hover:shadow-xl transition-shadow">
        <img src="{{$article->images->first()->path}}" alt="Historical Event 1" class="w-full h-48 object-cover"/>
        <div class="p-6">
            <h4 class="text-xl font-semibold mb-2 text-amber-900">{{$article->title}}</h4>
            <p class="text-amber-800">{{$article->description}}</p>
            <div class="mt-4">
                <a href="/article/{{$article->id}}" class="inline-flex items-center justify-center bg-amber-700 text-white font-medium py-2 px-6 rounded hover:bg-amber-800 transition-colors shadow-sm border border-amber-800">
                    <span>Show Details</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endforeach
            </div>
            <div class="mt-6">
                {{ $articles->links('pagination::tailwind') }}
            </div>

        </div>
    </section>

    <!-- Featured Content Section -->
    <section class="py-16 bg-amber-800 text-amber-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-3xl font-bold font-serif">Featured Discoveries</h3>
                <div class="space-x-4">
                    <select class="rounded-lg bg-amber-700 text-amber-100 py-2 px-4 border-amber-600">
                        <option>All Regions</option>
                        <option>Europe</option>
                        <option>Asia</option>
                        <option>Americas</option>
                    </select>
                    <select class="rounded-lg bg-amber-700 text-amber-100 py-2 px-4 border-amber-600">
                        <option>All Time Periods</option>
                        <option>Ancient</option>
                        <option>Medieval</option>
                        <option>Modern</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($articles->take(2)  as $article)
                <div class="flex space-x-4 bg-amber-900/50 p-4 rounded-lg">
                    <img src="https://static.wixstatic.com/media/c90d45_579e8fb78f23465f918e86976c74144b~mv2.webp/v1/fill/w_568,h_324,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/c90d45_579e8fb78f23465f918e86976c74144b~mv2.webp" alt="Featured 2" class="w-32 h-32 object-cover rounded-lg"/>
                    <div>
                        <h4 class="text-xl font-semibold mb-2">{{$article->title}}</h4>
                        <p class="text-amber-200">{{$article->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Testimonials Section -->
    <section class="py-16 parchment">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-3xl font-bold text-amber-900 mb-8 text-center font-serif">Voices from Our Community</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-amber-100 p-6 rounded-lg shadow-md border border-amber-200">
                    <p class="text-amber-800 mb-4">"TimeTrekker has transformed how I understand history. The interactive timeline feature is brilliant!"</p>
                    <p class="font-semibold text-amber-900">- Sarah Johnson</p>
                </div>
                <div class="bg-amber-100 p-6 rounded-lg shadow-md border border-amber-200">
                    <p class="text-amber-800 mb-4">"As a history teacher, this platform has become an invaluable resource for my classroom."</p>
                    <p class="font-semibold text-amber-900">- Michael Chen</p>
                </div>
                <div class="bg-amber-100 p-6 rounded-lg shadow-md border border-amber-200">
                    <p class="text-amber-800 mb-4">"The detailed articles and visual aids make learning history engaging and fun."</p>
                    <p class="font-semibold text-amber-900">- Emma Thompson</p>
                </div>
                </div>
        </div>
    </section>
    @endsection
</body>
</html>
