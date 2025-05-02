<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Submit Content - TimeTrekker</title>
  <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .dropzone {
      border: 2px dashed #92400e;
      transition: all 0.3s ease;
    }
    .dropzone:hover {
      border-color: #78350f;
      background-color: #fef3c7;
    }
    .writing-guide {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease-out;
    }
    .writing-guide.open {
      max-height: 500px;
    }
  </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
  <!-- Navigation -->
  <nav class="fixed w-full bg-gradient-to-r from-amber-900/95 to-amber-800/95 backdrop-blur-sm shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <div class="flex-1 flex justify-between items-center">
          <h1 class="text-2xl font-bold text-amber-100">
            <span class="text-amber-400">⌛</span> TimeTrekker
          </h1>
          <div class="hidden sm:flex sm:space-x-8">
            <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md">Home</a>
            <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md">Explore</a>
            <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md">Login</a>
            <a href="#" class="text-amber-100 hover:text-amber-200 px-3 py-2 rounded-md">About</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="pt-24 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-amber-900">Share Your Historical Knowledge</h2>
        <p class="text-amber-700 mt-2">Contribute to our growing collection of historical content</p>
      </div>

      <!-- Content Guidelines Card -->
      <div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <div class="flex items-center justify-between cursor-pointer">
          <h3 class="text-lg font-bold text-amber-900">Content Guidelines</h3>
          <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </div>
        <div class="writing-guide open">
          <div class="mt-4 space-y-4 text-amber-800">
            <div class="flex items-start gap-2">
              <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p>Ensure historical accuracy with reliable sources and citations</p>
            </div>
            <div class="flex items-start gap-2">
              <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p>Write in clear, engaging language suitable for a general audience</p>
            </div>
            <div class="flex items-start gap-2">
              <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p>Include relevant dates, locations, and historical context</p>
            </div>
            <div class="flex items-start gap-2">
              <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p>Use high-quality images with proper attribution</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Submission Form -->
      <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data" class="space-y-8">
        @csrf
        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow-md p-6">
          <h3 class="text-lg font-bold text-amber-900 mb-4">Basic Information</h3>
          <div class="space-y-4">
            <div>
              <label class="block text-amber-800 mb-2">Article Title</label>
              <input type="text" name="title" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200" placeholder="e.g., The Industrial Revolution in England" required />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-amber-800 mb-2">Time Period</label>
                <input type="text" name="time_period" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200" placeholder="e.g., 1760-1840" required />
              </div>
              <div>
                <label class="block text-amber-800 mb-2">Location</label>
                <input type="text" name="location" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200" placeholder="e.g., England, Great Britain" required />
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
              <textarea name="description" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-24" placeholder="Provide a brief overview of the historical event or period..."></textarea>
            </div>
            <div>
              <label class="block text-amber-800 mb-2">Main Content</label>
              <textarea name="content" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-64" placeholder="Write your detailed historical account here..."></textarea>
            </div>
          </div>
        </div>

        <!-- Image URLs (for images instead of file uploads) -->
        <div class="bg-white rounded-xl shadow-md p-6">
          <h3 class="text-lg font-bold text-amber-900 mb-4">Image URLs</h3>
          <div id="image-links-wrapper" class="space-y-4">
            <input type="url" name="image_links[]" placeholder="https://example.com/image.jpg"
              class="w-full px-4 py-2 border border-amber-200 rounded-lg">
          </div>
          <button type="button" onclick="addImageLink()" class="mt-2 px-4 py-2 bg-amber-200 text-amber-900 rounded-lg hover:bg-amber-300">
            + Add Another Image URL
          </button>
        </div>

        <!-- Media Links -->
        <div class="bg-white rounded-xl shadow-md p-6">
          <h3 class="text-lg font-bold text-amber-900 mb-4">Media Links</h3>
          <div id="media-links-wrapper" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <select name="media_types[]" class="w-full px-4 py-2 border border-amber-200 rounded-lg">
                <option value="video">Video</option>
                <option value="audio">Audio</option>
              </select>
              <input type="url" name="media_links[]" class="w-full px-4 py-2 border border-amber-200 rounded-lg" placeholder="https://example.com/media-link">
            </div>
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
              <textarea name="references" class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-32" placeholder="List your sources and references here..."></textarea>
            </div>
          </div>
        </div>

        <!-- Preview Section -->
        <div class="bg-white rounded-xl shadow-md p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-amber-900">Preview</h3>
            <button type="button" class="text-amber-600 hover:text-amber-700">Refresh Preview</button>
          </div>
          <div class="border border-amber-200 rounded-lg p-6">
            <p class="text-amber-700 text-center">Click "Refresh Preview" to see how your article will appear</p>
          </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end space-x-4">
          <button type="button" class="px-6 py-2 bg-amber-100 text-amber-900 rounded-lg hover:bg-amber-200">
            Save Draft
          </button>
          <button type="submit" class="px-6 py-2 bg-amber-700 text-amber-100 rounded-lg hover:bg-amber-600">
            Submit for Review
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-amber-900 text-amber-100 py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <p>© 2025 TimeTrekker. All rights reserved.</p>
    </div>
  </footer>

  <!-- JavaScript to add dynamic fields -->
  <script>
    function addImageLink() {
      const wrapper = document.getElementById('image-links-wrapper');
      const newInput = document.createElement('input');
      newInput.type = 'url';
      newInput.name = 'image_links[]';
      newInput.placeholder = 'https://example.com/image.jpg';
      newInput.className = 'w-full px-4 py-2 border border-amber-200 rounded-lg mt-2';
      wrapper.appendChild(newInput);
    }

    function addMediaLink() {
      const wrapper = document.getElementById('media-links-wrapper');
      const newField = document.createElement('div');
      newField.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'gap-4', 'mt-2');
      newField.innerHTML = `
        <select name="media_types[]" class="w-full px-4 py-2 border border-amber-200 rounded-lg">
          <option value="video">Video</option>
          <option value="audio">Audio</option>
          <option value="pdf">PDF</option>
        </select>
        <input type="url" name="media_links[]" placeholder="https://example.com/media-link" class="w-full px-4 py-2 border border-amber-200 rounded-lg">
      `;
      wrapper.appendChild(newField);
    }
  </script>
</body>
</html>
