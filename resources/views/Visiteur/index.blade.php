@extends('Visiteur.master')
@section('content')
<!-- Tailwind Custom Animations -->
<style>
    @keyframes fade-in-down {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in-down {
        animation: fade-in-down 1s ease-out forwards;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1.2s ease-out forwards;
    }
</style>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Hero Section -->
    <div class="relative pt-24 pb-32 flex items-center justify-center min-h-screen">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.alphacoders.com/119/1198811.jpeg');">
            <div class="absolute inset-0 bg-amber-900 opacity-60"></div>
        </div>
        <div class="container relative z-10 text-center px-4">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif font-semibold text-amber-100 tracking-tight animate-fade-in-down">
                Where Time Becomes<br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-300 to-amber-500">Adventure</span>
            </h1>
            <p class="mt-4 text-sm sm:text-base md:text-lg text-amber-200 max-w-2xl mx-auto animate-fade-in-up leading-relaxed">
                Step through the portals of time and witness history unfold before your eyes.
            </p>
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
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($articles->take(2)  as $article)
                <div class="flex space-x-4 bg-amber-900/50 p-4 rounded-lg">
                    <img src="{{$article->images->get(1)?->path}}" alt="Featured 2" class="w-32 h-32 object-cover rounded-lg"/>
                    <div>
                        <h4 class="text-xl font-semibold mb-2">{{$article->title}}</h4>
                        <p class="text-amber-200">{{$article->description}}</p>
                    </div>
                    <div class="mt-4">
                        <a href="/article/{{$article->id}}" class="inline-flex items-center justify-center bg-amber-700 text-white font-medium py-2 px-6 rounded hover:bg-amber-800 transition-colors shadow-sm border border-amber-800">
                            <span>Show Details</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
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
