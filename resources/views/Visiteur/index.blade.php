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
    <div class="relative flex items-center justify-center min-h-screen" style="padding-top: 6rem; padding-bottom: 8rem;">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.alphacoders.com/119/1198811.jpeg');">
            <div class="absolute inset-0 bg-amber-900 opacity-0"></div>
        </div>

        <div class="container relative z-10 text-center px-4 mx-auto max-w-6xl">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-semibold text-amber-100 tracking-tight animate-fade-in-down">
                Where Time Becomes<br>
                <span style="background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(to right, #fcd34d, #f59e0b);">Adventure</span>
            </h1>

            <p class="mt-4 text-sm sm:text-base md:text-lg text-amber-200 max-w-2xl mx-auto animate-fade-in-up leading-relaxed">
                Step through the portals of time and witness history unfold before your eyes.
            </p>

            <!-- Added CTA button -->
            <div class="mt-8 sm:mt-10 animate-fade-in-up" style="animation-delay: 0.6s; opacity: 0;">
                <a href="#" class="inline-block px-6 py-3 sm:px-8 sm:py-4 rounded-lg bg-amber-500 hover:bg-amber-600 text-amber-900 font-medium text-sm sm:text-base transition-all duration-300 animate-pulse shadow-lg hover:shadow-xl">
                    Begin Your Journey
                </a>
            </div>

            <!-- Added time period options -->
            <div class="mt-12 sm:mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 animate-fade-in-up" style="animation-delay: 0.9s; opacity: 0;">
                <div class="bg-amber-900 bg-opacity-70 p-4 rounded-lg hover:bg-opacity-90 transition-all cursor-pointer">
                    <h3 class="text-amber-200 font-medium">Ancient World</h3>
                    <p class="text-amber-300 text-sm mt-1">3000 BCE - 500 CE</p>
                </div>
                <div class="bg-amber-900 bg-opacity-70 p-4 rounded-lg hover:bg-opacity-90 transition-all cursor-pointer">
                    <h3 class="text-amber-200 font-medium">Medieval Era</h3>
                    <p class="text-amber-300 text-sm mt-1">500 - 1500 CE</p>
                </div>
                <div class="bg-amber-900 bg-opacity-70 p-4 rounded-lg hover:bg-opacity-90 transition-all cursor-pointer">
                    <h3 class="text-amber-200 font-medium">Modern Age</h3>
                    <p class="text-amber-300 text-sm mt-1">1500 - 1900 CE</p>
                </div>
                <div class="bg-amber-900 bg-opacity-70 p-4 rounded-lg hover:bg-opacity-90 transition-all cursor-pointer">
                    <h3 class="text-amber-200 font-medium">Contemporary</h3>
                    <p class="text-amber-300 text-sm mt-1">1900 - Present</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Historical Events Section -->
    <!-- Historical Events Section -->
<section class="content-section bg-amber-50 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-3xl font-bold text-gray-800 mb-12 text-center font-serif relative">
            <span class="inline-block pb-2 border-b-2 border-amber-700">Pivotal Moments in History</span>
          </h3>
        {{-- <h3 class="text-2xl font-bold text-amber-900 mb-6 font-serif text-center section-heading border-0">Pivotal Moments in History</h3> --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articles as $article)
                <div class="card hover-scale bg-white rounded-md shadow-sm overflow-hidden border border-gray-100 transition-all hover:shadow-lg">
                    <div class="h-48 overflow-hidden relative">
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
                            <span class="text-xs text-gray-500">{{ $article->date }}</span>
                            <a href="/article/{{$article->id}}" class="text-amber-700 hover:text-amber-900 font-semibold text-sm flex items-center">
                                Lire plus <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5 flex justify-center">
            {{ $articles->links('pagination::simple-tailwind') }}
        </div>
    </div>
</section>



      <!-- Featured Content Section -->
    <section class="py-8 bg-amber-800/90 text-amber-50">
        <div class="container mx-auto px-4">
          <h3 class="text-xl font-semibold mb-5">Featured Discoveries</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($articles->take(2) as $article)
              <div class="flex bg-amber-800/30 rounded overflow-hidden shadow-sm">
                <img src="{{$article->images->get(1)?->path}}" alt="{{$article->title}}" class="w-24 h-24 object-cover"/>
                <div class="p-3 flex-1 flex flex-col justify-between">
                  <div>
                    <h4 class="text-base font-medium mb-1">{{$article->title}}</h4>
                    <p class="text-amber-100/80 text-xs line-clamp-2">{{$article->description}}</p>
                  </div>
                  <div class="mt-2 flex justify-end">
                    <a href="/article/{{$article->id}}" class="text-xs font-medium bg-amber-600/70 hover:bg-amber-500/70 text-white py-1 px-3 rounded-sm flex items-center transition-colors">
                      Details
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    <!-- Testimonials Section -->
    <section class="py-16 parchment">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h3 class="text-3xl font-bold text-gray-800 mb-12 text-center font-serif relative">
            <span class="inline-block pb-2 border-b-2 border-amber-700">Voices from Our Community</span>
          </h3>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200 testimonial-card">
              <span class="text-amber-700 quote-mark">"</span>
              <p class="text-gray-700 mb-6 text-lg italic">"TimeTrekker has transformed how I understand history. The interactive timeline feature is brilliant!"</p>
              <div class="flex items-center mt-4">
                <div class="bg-amber-100 h-12 w-12 rounded-full flex items-center justify-center mr-3">
                  <span class="text-amber-800 font-bold text-lg">SJ</span>
                </div>
                <div>
                  <p class="font-semibold text-gray-900">Sarah Johnson</p>
                  <p class="text-gray-500 text-sm">Historical Enthusiast</p>
                </div>
              </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200 testimonial-card">
              <span class="text-amber-700 quote-mark">"</span>
              <p class="text-gray-700 mb-6 text-lg italic">"As a history teacher, this platform has become an invaluable resource for my classroom."</p>
              <div class="flex items-center mt-4">
                <div class="bg-amber-100 h-12 w-12 rounded-full flex items-center justify-center mr-3">
                  <span class="text-amber-800 font-bold text-lg">MC</span>
                </div>
                <div>
                  <p class="font-semibold text-gray-900">Michael Chen</p>
                  <p class="text-gray-500 text-sm">History Educator</p>
                </div>
              </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200 testimonial-card">
              <span class="text-amber-700 quote-mark">"</span>
              <p class="text-gray-700 mb-6 text-lg italic">"The detailed articles and visual aids make learning history engaging and fun."</p>
              <div class="flex items-center mt-4">
                <div class="bg-amber-100 h-12 w-12 rounded-full flex items-center justify-center mr-3">
                  <span class="text-amber-800 font-bold text-lg">ET</span>
                </div>
                <div>
                  <p class="font-semibold text-gray-900">Emma Thompson</p>
                  <p class="text-gray-500 text-sm">Student Researcher</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endsection
</body>
</html>
