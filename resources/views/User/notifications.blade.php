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

    .notification-item {
        transition: all 0.3s ease;
    }

    .notification-item:hover {
        transform: translateY(-2px);
    }

    .unread {
        border-left: 4px solid #f59e0b;
    }
</style>

<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Notification Header -->
    <div class="relative bg-amber-800 py-12 mb-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl sm:text-4xl font-serif font-semibold text-amber-100 tracking-tight animate-fade-in-down text-center">
                Your Notifications
            </h1>
            <p class="mt-4 text-sm sm:text-base text-amber-200 max-w-2xl mx-auto animate-fade-in-up text-center leading-relaxed">
                Stay updated with the latest discoveries and activities from TimeTrekker
            </p>
        </div>
    </div>

    <!-- Notifications Container -->
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Notification Filters -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-amber-900">All Notifications</h2>
            <div class="flex gap-2">
                <button class="px-4 py-2 text-sm font-medium bg-amber-100 text-amber-900 rounded-md hover:bg-amber-200 transition-all">
                    All
                </button>
                <button class="px-4 py-2 text-sm font-medium bg-white text-amber-800 rounded-md hover:bg-amber-100 transition-all">
                    Unread
                </button>
                <button class="px-4 py-2 text-sm font-medium bg-white text-amber-800 rounded-md hover:bg-amber-100 transition-all">
                    Read
                </button>
            </div>
        </div>

        <!-- Notifications List -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            @if(count($notifications) > 0)
                @foreach($notifications as $notification)
                    <div class="notification-item p-4 border-b border-gray-100 flex items-start gap-4 {{ !$notification->read_at ? 'unread bg-amber-50' : 'bg-white' }}">
                        <!-- Notification Icon -->
                        <div class="h-10 w-10 rounded-full flex items-center justify-center {{ !$notification->read_at ? 'bg-amber-100 text-amber-700' : 'bg-gray-100 text-gray-500' }}">
                            @if(isset($notification->data['type']))
                            @if($notification->data['type'] === 'article')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            @elseif($notification->data['type'] === 'comment')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            @elseif($notification->data['type'] === 'system')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif
                            @endif
                        </div>

                        <!-- Notification Content -->
                        <div class="flex-1">
                            <p class="text-gray-800 font-medium">{{ $notification->data['title'] }}</p>
                            <p class="text-gray-600 text-sm mt-1">{{ $notification->data['message'] }}</p>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                                @if(!$notification->read_at)
                                    <form method="POST" action="{{ route('notifications.markAsRead', $notification->id) }}">
                                        @csrf
                                        <button type="submit" class="text-xs text-amber-700 hover:text-amber-900">Mark as read</button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <!-- Action Button -->
                        @if(isset($notification->data['action_url']))
                            <a href="{{ $notification->data['action_url'] }}" class="self-center text-amber-700 hover:text-amber-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="p-16 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11c0-3.07-1.64-5.64-4.5-6.32V4a1.5 1.5 0 00-3 0v.68C7.64 5.36 6 7.929 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-800 mb-2">No notifications yet</h3>
                    <p class="text-gray-600">You're all caught up! Check back later for updates on your favorite historical periods.</p>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if(isset($notifications) && count($notifications) > 0)
            <div class="mt-5 flex justify-center">
                {{ $notifications->links('pagination::simple-tailwind') }}
            </div>
        @endif

        <!-- Clear All Button -->
        @if(isset($notifications) && count($notifications) > 0)
            <div class="mt-6 text-center">
                <form method="POST" action="{{ route('notifications.markAllAsRead') }}">
                    @csrf
                    <button type="submit" class="inline-block px-6 py-2 rounded-md bg-amber-600 hover:bg-amber-700 text-white font-medium text-sm transition-all duration-300 shadow-sm hover:shadow-md">
                        Mark All as Read
                    </button>
                </form>
            </div>
        @endif
    </div>

  
@endsection
</body>
