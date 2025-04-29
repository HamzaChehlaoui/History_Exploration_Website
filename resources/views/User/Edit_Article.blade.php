@extends('Visiteur.master')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-amber-900">Edit Article</h1>
        <p class="text-amber-700">Update your historical article</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Please correct the following errors:</h3>
                    <ul class="mt-1 text-sm text-red-700 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-amber-900 mb-4">Basic Information</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-amber-800 mb-2">Article Title</label>
                    <input type="text" name="title" value="{{ old('title', $article->title) }}" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200" placeholder="e.g., The Industrial Revolution in England" required />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-amber-800 mb-2">Time Period</label>
                        <input type="text" name="time_period" value="{{ old('time_period', $article->time_period) }}" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200" placeholder="e.g., 1760-1840" required />
                    </div>
                    <div>
                        <label class="block text-amber-800 mb-2">Location</label>
                        <input type="text" name="location" value="{{ old('location', $article->location) }}" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200" placeholder="e.g., England, Great Britain" required />
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-amber-900 mb-4">Article Content</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-amber-800 mb-2">Brief Description</label>
                    <textarea name="description" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-24" placeholder="Provide a brief overview of the historical event or period...">{{ old('description', $article->description) }}</textarea>
                </div>
                <div>
                    <label class="block text-amber-800 mb-2">Main Content</label>
                    <textarea name="content" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-64" placeholder="Write your detailed historical account here...">{{ old('content', $article->content) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Image URLs -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-amber-900 mb-4">Image URLs</h3>
            <div id="image-links-wrapper" class="space-y-4">
                @forelse ($article->images as $index => $image)
                    <div class="flex items-center space-x-2">
                        <input type="url" name="image_links[]" value="{{ old('image_links.'.$index, $image->url) }}"
                            class="w-full px-4 py-2 border border-amber-200 rounded-lg" placeholder="https://example.com/image.jpg">
                        <button type="button" onclick="removeField(this)" class="p-2 text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                @empty
                    <input type="url" name="image_links[]" placeholder="https://example.com/image.jpg"
                        class="w-full px-4 py-2 border border-amber-200 rounded-lg">
                @endforelse
            </div>
            <button type="button" onclick="addImageLink()" class="mt-2 px-4 py-2 bg-amber-200 text-amber-900 rounded-lg hover:bg-amber-300">
                + Add Another Image URL
            </button>
        </div>

        <!-- Media Links -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-amber-900 mb-4">Media Links</h3>
            <div id="media-links-wrapper" class="space-y-4">
                @forelse ($article->media as $index => $media)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <select name="media_types[]" class="w-full px-4 py-2 border border-amber-200 rounded-lg">
                            <option value="video" {{ $media->type == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="audio" {{ $media->type == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="pdf" {{ $media->type == 'pdf' ? 'selected' : '' }}>PDF</option>
                        </select>
                        <div class="flex items-center space-x-2">
                            <input type="url" name="media_links[]" value="{{ old('media_links.'.$index, $media->url) }}"
                                class="w-full px-4 py-2 border border-amber-200 rounded-lg" placeholder="https://example.com/media-link">
                            <button type="button" onclick="removeMediaField(this)" class="p-2 text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <select name="media_types[]" class="w-full px-4 py-2 border border-amber-200 rounded-lg">
                            <option value="video">Video</option>
                            <option value="audio">Audio</option>
                            <option value="pdf">PDF</option>
                        </select>
                        <input type="url" name="media_links[]" class="w-full px-4 py-2 border border-amber-200 rounded-lg" placeholder="https://example.com/media-link">
                    </div>
                @endforelse
            </div>
            <button type="button" onclick="addMediaLink()" class="mt-2 px-4 py-2 bg-amber-200 text-amber-900 rounded-lg hover:bg-amber-300">
                + Add Another Media Link
            </button>
        </div>

        <!-- References -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-amber-900 mb-4">References</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-amber-800 mb-2">Sources</label>
                    <textarea name="references" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-32" placeholder="List your sources and references here...">{{ old('references', $article->references) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-between items-center">
            <a href="{{ route('articles.show', $article->id) }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-150">
                Cancel
            </a>
            <div class="flex space-x-4">
                <button type="submit" name="save_draft" value="1" class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200 transition duration-150">
                    Save Draft
                </button>
                <button type="submit" class="px-6 py-2 bg-amber-700 text-amber-100 rounded-lg hover:bg-amber-600 transition duration-150">
                    Update Article
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    function addImageLink() {
        const wrapper = document.getElementById('image-links-wrapper');
        const newField = document.createElement('div');
        newField.className = 'flex items-center space-x-2';
        newField.innerHTML = `
            <input type="url" name="image_links[]" placeholder="https://example.com/image.jpg"
                class="w-full px-4 py-2 border border-amber-200 rounded-lg">
            <button type="button" onclick="removeField(this)" class="p-2 text-red-500 hover:text-red-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        `;
        wrapper.appendChild(newField);
    }

    function removeField(button) {
        button.parentElement.remove();
    }

    function addMediaLink() {
        const wrapper = document.getElementById('media-links-wrapper');
        const newField = document.createElement('div');
        newField.className = 'grid grid-cols-1 md:grid-cols-2 gap-4';
        newField.innerHTML = `
            <select name="media_types[]" class="w-full px-4 py-2 border border-amber-200 rounded-lg">
                <option value="video">Video</option>
                <option value="audio">Audio</option>
                <option value="pdf">PDF</option>
            </select>
            <div class="flex items-center space-x-2">
                <input type="url" name="media_links[]" class="w-full px-4 py-2 border border-amber-200 rounded-lg" placeholder="https://example.com/media-link">
                <button type="button" onclick="removeMediaField(this)" class="p-2 text-red-500 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        `;
        wrapper.appendChild(newField);
    }

    function removeMediaField(button) {
        button.closest('.grid').remove();
    }
</script>
@endsection
