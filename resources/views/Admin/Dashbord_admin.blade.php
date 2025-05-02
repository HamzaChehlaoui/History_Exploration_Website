<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Admin Dashboard</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <style>
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .data-table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .data-table th {
            background-color: rgba(146, 64, 14, 0.1);
        }

        .data-table th:first-child {
            border-top-left-radius: 0.5rem;
        }

        .data-table th:last-child {
            border-top-right-radius: 0.5rem;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full bg-gradient-to-r from-amber-900 to-amber-800 backdrop-blur-sm shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/4645/4645379.png" alt="TimeTrekker Logo" class="h-8 w-8 md:h-10 md:w-10">
                    <span class="text-xl md:text-2xl font-bold text-amber-100">TimeTrekker</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-amber-100">Admin: {{auth()->user()->name}}</span>
                    <div class="relative" id="profileContainer">
                        <img src="/api/placeholder/40/40" alt="Admin Profile" class="h-8 w-8 rounded-full border-2 border-amber-400 cursor-pointer" id="profileButton">
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden" id="profileDropdown">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-amber-900 hover:bg-amber-100">My Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-amber-900 hover:bg-amber-100">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-amber-100">Logout</a>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="/logout" class="hidden md:block">
                        <button type="submit" class="text-amber-200 hover:text-white px-3 py-2 rounded-md text-base font-medium hover:bg-amber-800 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Layout -->
    <div class="flex min-h-screen pt-16">
        <!-- Sidebar -->
        <div class="w-64 bg-amber-900/95 text-amber-100 p-4 space-y-4">
            <div class="space-y-2">
                <a href="#" class="block px-4 py-2 rounded-lg bg-amber-800/50 hover:bg-amber-800 transition-colors nav-link" data-target="dashboard">
                    Dashboard Overview
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors nav-link" data-target="users">
                    User Management
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors nav-link" data-target="content">
                    Content Management
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-amber-800/50 transition-colors nav-link" data-target="reports">
                    Product Management
                </a>

            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Dashboard Overview Tab -->
            <div id="dashboard" class="tab-content active">
                <h2 class="text-2xl font-bold text-amber-900 mb-6">Dashboard Overview</h2>

               <!-- Statistics Overview -->
    <div class="stats-grid mb-8">
        <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
            <h3 class="text-lg font-semibold text-amber-900 mb-2">Total Users</h3>
            <p class="text-3xl font-bold text-amber-700">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
            <h3 class="text-lg font-semibold text-amber-900 mb-2">Total Articles</h3>
            <p class="text-3xl font-bold text-amber-700">{{ $totalArticles }}</p>
        </div>
        <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
            <h3 class="text-lg font-semibold text-amber-900 mb-2">Total Products</h3>
            <p class="text-3xl font-bold text-amber-700">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200">
            <h3 class="text-lg font-semibold text-amber-900 mb-2">Total Commands</h3>
            <p class="text-3xl font-bold text-amber-700">{{ $totalCommands }}</p>
        </div>
    </div>

                <!-- Activity Graph -->
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
            </div>

            <!-- User Management Tab -->
            <div id="users" class="tab-content">
                <h2 class="text-2xl font-bold text-amber-900 mb-6">User Management</h2>

                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-amber-900">Users</h3>
                        <div class="flex space-x-2">
                            <form method="GET" action="{{ url()->current() }}" class="flex space-x-2">
                                <input
                                    type="text"
                                    name="search_user"
                                    value="{{ request('search_user') }}"
                                    placeholder="Search users..."
                                    class="rounded-lg bg-amber-50 text-amber-900 py-1 px-3 border border-amber-200"
                                >
                                <button type="submit" class="bg-amber-700 text-white py-1 px-4 rounded-lg hover:bg-amber-800 transition-colors">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full data-table">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-amber-900">User</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Role</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Status</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Articles</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Last Login</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="border-b border-amber-100">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY48mP_RrEOMRCUTUws1Ltv2oNf7OiwnFh4w&s" alt="User" class="h-8 w-8 rounded-full mr-2"/>
                                                <div>
                                                    <div class="text-amber-900">{{ $user->name }}</div>
                                                    <div class="text-sm text-amber-600">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-amber-700">
                                            @if($user->role_id === 1)
                                                Admin
                                            @else
                                                User
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                        </td>
                                        <td class="px-4 py-3 text-amber-700">{{ $user->articles_count }}</td>
                                        <td class="px-4 py-3 text-amber-700">2025-04-25</td>
                                        <td class="px-4 py-3">
                                            <div class="flex space-x-2">
                                                @if($user->role_id !== 1)
                                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button class="text-red-600 hover:text-red-900" onclick="confirmDelete({{ $user->id }})">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    {{ $users->links() }}
                </div>


            </div>

            <!-- Content Management Tab -->
            <div id="content" class="tab-content">
                <h2 class="text-2xl font-bold text-amber-900 mb-6">Content Management</h2>

                <div class="bg-white/80 backdrop-blur-sm rounded-lg shadow-xl p-6 border border-amber-200 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-amber-900">Articles</h3>
                        <div class="flex space-x-2">


                            <a href="{{ route('article.create') }}">
                            <button class="bg-amber-700 text-white py-1 px-4 rounded-lg hover:bg-amber-800 transition-colors">
                                Add Article
                            </button>
                        </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full data-table">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-amber-900">Title</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Author</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Category</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Status</th>
                                    <th class="px-4 py-2 text-left text-amber-900">Actions</th>
                                </tr>
                            </thead>
                            @foreach($articles as $article)
                                <tr class="border-b border-amber-100">
                                    <td class="px-4 py-3 text-amber-900">{{ $article->title }}</td>
                                    <td class="px-4 py-3 text-amber-700">{{ $article->utilisateur->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-amber-700">{{ $article->category->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">{{ ucfirst($article->status) }}</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex space-x-2">
                                            <form action="{{ route('article.approve', $article->id) }}" method="POST" class="approve-form">
                                                @csrf
                                                <button type="submit" class="text-green-600 hover:text-green-500">Approve</button>
                                            </form>

                                            <form action="{{ route('article.reject', $article->id) }}" method="POST" class="reject-form">
                                                @csrf
                                                <button type="submit" class="text-yellow-600 hover:text-yellow-500">Reject</button>
                                            </form>

                                            <form action="{{ route('article.destroy', $article->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-500">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Product Management -->
            <div id="reports" class="tab-content">


               <!-- Main Content -->
    <main class="pt-24 pb-12 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Header with Search and Add Button -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                <h2 class="text-3xl font-bold text-amber-900">Product Management</h2>
                <div class="flex gap-4 w-full sm:w-auto">
                    <div class="relative flex-1 sm:flex-initial">
                        <form method="GET" action="{{ url()->current() }}" class="flex gap-2 w-full sm:w-auto">
                            <div class="relative flex-1 sm:flex-initial">
                                <input
                                    type="search"
                                    name="search_product"
                                    value="{{ request('search_product') }}"
                                    placeholder="Search products..."
                                    class="w-full pl-10 pr-4 py-2 rounded-lg bg-amber-50 border border-amber-300 focus:outline-none focus:ring-2 focus:ring-amber-500"
                                >
                                <svg class="w-5 h-5 absolute left-3 top-2.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-amber-800 text-amber-100 rounded-lg hover:bg-amber-700 transition-colors">
                                Search
                            </button>
                        </form>


                    </div>
                    <a href="/Add_prodact">
                    <button class="px-4 py-2 bg-amber-800 text-amber-100 rounded-lg hover:bg-amber-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Product
                    </button>
                </a>
                </div>
            </div>

            <!-- Product List -->
            <div class="store-card rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-amber-800 text-amber-100">
                            <tr>
                                <th class="px-6 py-3 text-left">Product</th>
                                <th class="px-6 py-3 text-left">Price</th>
                                <th class="px-6 py-3 text-left">Stock</th>
                                <th class="px-6 py-3 text-left">Status</th>
                                <th class="px-6 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-amber-200">
                            @foreach ($products as $product)
                            <tr class="hover:bg-amber-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $product->imagePath ?? 'default.jpg' }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded"/>
                                        <div>
                                            <div class="font-semibold text-amber-900">{{ $product->name }}</div>
                                            <div class="text-sm text-amber-700">SKU: {{ $product->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-amber-700">${{ number_format($product->prix, 2) }}</td>
                                <td class="px-6 py-4 text-amber-700">{{ $product->quantite }}</td>
                                <td class="px-6 py-4">
                                    @if($product->quantite > 0)
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                    @else
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-sm">Out of Stock</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-amber-600 hover:text-amber-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}" id="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="text-red-600 hover:text-red-900" id="deleteBtn">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </main>
            </div>


        </div>
    </div>

<script src="/js/Dashbord_admin.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function confirmAction(form, title, text, icon) {
            event.preventDefault();
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, confirm!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        document.querySelectorAll('.approve-form').forEach(form => {
            form.addEventListener('submit', function (event) {
                confirmAction(form, 'Approve Article', 'Are you sure you want to approve this article?', 'success');
            });
        });

        document.querySelectorAll('.reject-form').forEach(form => {
            form.addEventListener('submit', function (event) {
                confirmAction(form, 'Reject Article', 'Are you sure you want to reject this article?', 'warning');
            });
        });

        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (event) {
                confirmAction(form, 'Delete Article', 'Are you sure you want to delete this article?', 'error');
            });
        });
    });
    document.getElementById('deleteBtn').addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the form from being submitted immediately

        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    });
    </script>


</body>
</html>
