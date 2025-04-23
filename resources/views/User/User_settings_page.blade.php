<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TimeTrekker - Edit Profile</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
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

    .image-preview {
        background-size: cover;
        background-position: center;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        border-color: #b45309;
        box-shadow: 0 0 0 3px rgba(180, 83, 9, 0.2);
    }

    .form-input {
        transition: all 0.3s ease;
    }

    .profile-upload:hover .upload-overlay {
        opacity: 1;
    }

    .upload-overlay {
        opacity: 0;
        transition: all 0.3s ease;
    }
</style>

<!-- Profile Header Section -->
<section class="relative h-64 bg-cover bg-center" style="background-image: url('https://www.pcworld.com/wp-content/uploads/2023/09/AssassinsCreedMirage_01_Aufmacher.jpg?quality=50&strip=all');">
    <div class="absolute inset-0 bg-amber-900 opacity-60"></div>
    <div class="absolute bottom-0 left-0 w-full transform translate-y-1/2 px-4">
        <div class="max-w-6xl mx-auto flex items-end">
            <div class="relative z-10">
                <div class="profile-upload group relative rounded-full border-4 border-amber-100 overflow-hidden h-36 w-36 shadow-xl">
                    <div id="preview-container" class="h-full w-full image-preview" style="background-image: url('{{ $user->profileImage ? asset('storage/' . $user->profileImage->path) : asset('storage/profile-images/default.jpg') }}')"></div>
                    <div class="upload-overlay absolute inset-0 bg-amber-900 bg-opacity-70 flex items-center justify-center">
                        <svg class="h-12 w-12 text-amber-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="ml-6 pb-4 mt-[2.5rem]">
                <h1 class="text-3xl font-bold text-amber-700">Edit Profile</h1>
                <p class="text-amber-700">Update your TimeTrekker profile information</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Profile Content -->
<div class="max-w-6xl mx-auto px-4 pt-24 pb-16">
    <div class="parchment rounded-lg shadow-md border border-amber-300 p-8">
        <!-- Form Alerts -->
        @if (session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Please check the form for errors.</span>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Edit Profile Form -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Hidden file input -->
            <input type="file" name="profile_image" id="profile-image-input" class="hidden" accept="image/*">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Personal Information Section -->
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-amber-900 border-b border-amber-200 pb-2">Personal Information</h2>

                    <div>
                        <label for="name" class="block text-amber-800 font-medium mb-2">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                            class="form-input w-full px-4 py-2 rounded-md border border-amber-300 focus:outline-none">
                    </div>

                    <div>
                        <label for="email" class="block text-amber-800 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            class="form-input w-full px-4 py-2 rounded-md border border-amber-300 focus:outline-none">
                    </div>

                    <div>
                        <label for="bio" class="block text-amber-800 font-medium mb-2">Bio</label>
                        <textarea id="bio" name="bio" rows="4"
                            class="form-input w-full px-4 py-2 rounded-md border border-amber-300 focus:outline-none">{{ old('bio', $user->bio) }}</textarea>
                        <p class="text-amber-600 text-sm mt-1">Tell us about yourself and your interest in history.</p>
                    </div>
                </div>

                <!-- Security Section -->
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-amber-900 border-b border-amber-200 pb-2">Security</h2>

                    <div>
                        <label for="current_password" class="block text-amber-800 font-medium mb-2">Current Password</label>
                        <input type="password" id="current_password" name="current_password"
                            class="form-input w-full px-4 py-2 rounded-md border border-amber-300 focus:outline-none">
                        <p class="text-amber-600 text-sm mt-1">Required to change password</p>
                    </div>

                    <div>
                        <label for="password" class="block text-amber-800 font-medium mb-2">New Password</label>
                        <input type="password" id="password" name="password"
                            class="form-input w-full px-4 py-2 rounded-md border border-amber-300 focus:outline-none">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-amber-800 font-medium mb-2">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-input w-full px-4 py-2 rounded-md border border-amber-300 focus:outline-none">
                        <p class="text-amber-600 text-sm mt-1">Leave password fields empty to keep your current password</p>
                    </div>

                    <div class="pt-4">
                        <label class="block text-amber-800 font-medium mb-2">Profile Picture</label>
                        <div class="flex items-center">
                            <button type="button" id="change-picture-btn"
                                class="px-4 py-2 bg-amber-700 text-amber-100 rounded-md hover:bg-amber-800 transition-colors">
                                Change Picture
                            </button>
                            <span class="ml-3 text-amber-600 text-sm">Click on the profile picture or this button to change your avatar</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-amber-200">
                <a href="{{ route('profile.show') }}" class="px-6 py-3 bg-amber-100 text-amber-800 rounded-md hover:bg-amber-200 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-amber-700 text-amber-100 rounded-md hover:bg-amber-800 transition-colors">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <!-- Timeline-like navigation -->
    <div class="relative mt-12">
        <div class="absolute left-3 top-0 w-2 h-full timeline-track rounded-full"></div>
        <div class="pl-12 space-y-8">
            <div class="relative scroll-trigger">
                <div class="absolute left-0 w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center">
                    <svg class="h-4 w-4 text-amber-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </div>
                <a href="{{ route('profile.show') }}" class="parchment inline-block p-4 rounded-lg shadow-md border border-amber-300 hover:bg-amber-50 transition-colors">
                    <span class="text-amber-800 font-medium">Return to Profile</span>
                </a>
            </div>

            <div class="relative scroll-trigger">
                <div class="absolute left-0 w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center">
                    <svg class="h-4 w-4 text-amber-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <a href="{{ route('article.create') }}" class="parchment inline-block p-4 rounded-lg shadow-md border border-amber-300 hover:bg-amber-50 transition-colors">
                    <span class="text-amber-800 font-medium">Create New Article</span>
                </a>
            </div>

            <div class="relative scroll-trigger">
                <div class="absolute left-0 w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center">
                    <svg class="h-4 w-4 text-amber-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <a href="{{ route('profile.favorites') }}" class="parchment inline-block p-4 rounded-lg shadow-md border border-amber-300 hover:bg-amber-50 transition-colors">
                    <span class="text-amber-800 font-medium">View Your Favorites</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll animation
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

        // Image preview functionality
        const profilePic = document.querySelector('.profile-upload');
        const imageInput = document.getElementById('profile-image-input');
        const previewContainer = document.getElementById('preview-container');
        const changeBtn = document.getElementById('change-picture-btn');

        // Handle click on profile picture or button
        profilePic.addEventListener('click', () => {
            imageInput.click();
        });

        changeBtn.addEventListener('click', () => {
            imageInput.click();
        });

        // Handle image preview
        imageInput.addEventListener('change', (e) => {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    previewContainer.style.backgroundImage = `url('${e.target.result}')`;
                }

                reader.readAsDataURL(file);
            }
        });
    });
</script>
