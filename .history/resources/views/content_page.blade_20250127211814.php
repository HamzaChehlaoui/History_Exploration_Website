<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Content - TimeTrekker</title>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <div class="writing-guide open">
                    <div class="mt-4 space-y-4 text-amber-800">
                        <div class="flex items-start gap-2">
                            <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p>Ensure historical accuracy with reliable sources and citations</p>
                        </div>
                        <div class="flex items-start gap-2">
                            <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p>Write in clear, engaging language suitable for a general audience</p>
                        </div>
                        <div class="flex items-start gap-2">
                            <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p>Include relevant dates, locations, and historical context</p>
                        </div>
                        <div class="flex items-start gap-2">
                            <svg class="w-6 h-6 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p>Use high-quality images with proper attribution</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submission Form -->
            <form class="space-y-8">
                <!-- Basic Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-amber-900 mb-4">Basic Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-amber-800 mb-2">Article Title</label>
                            <input type="text" 
                                   class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200"
                                   placeholder="e.g., The Industrial Revolution in England"/>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-amber-800 mb-2">Time Period</label>
                                <input type="text" 
                                       class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200"
                                       placeholder="e.g., 1760-1840"/>
                            </div>
                            <div>
                                <label class="block text-amber-800 mb-2">Location</label>
                                <input type="text" 
                                       class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200"
                                       placeholder="e.g., England, Great Britain"/>
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
                            <textarea 
                                class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-24"
                                placeholder="Provide a brief overview of the historical event or period..."></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-amber-800 mb-2">Main Content</label>
                            <textarea 
                                class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-64"
                                placeholder="Write your detailed historical account here..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Media Upload -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-amber-900 mb-4">Media Files</h3>
                    <div class="space-y-4">
                        <div class="dropzone rounded-lg p-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            <p class="mt-2 text-amber-800">Drag and drop files here, or click to select files</p>
                            <p class="text-sm text-amber-600 mt-1">Supported formats: JPG, PNG, PDF, MP4</p>
                        </div>

                        <!-- Uploaded Files Preview -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-between bg-amber-50 p-3 rounded-lg">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                                    <span class="text-amber-800">historical-photo-1.jpg</span>
                                </div>
                                <button class="text-amber-600 hover:text-amber-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- References -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-amber-900 mb-4">References</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-amber-800 mb-2">Sources</label>
                            <textarea 
                                class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 h-32"
                                placeholder="List your sources and references here..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-amber-900">Preview</h3>
                        <button type="button" class="text-amber-600 hover:text-amber-700">
                            Refresh Preview
                        </button>
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
</body>
</html>