@extends('Visiteur.master')

@section('content')
<style>
.map-marker {
        cursor: pointer;
    }

    .map-marker:hover {
        background-color: rgba(255, 165, 0, 0.6);
    }

</style>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Main Content -->
    <main class="pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search Section -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <div class="max-w-4xl mx-auto">
                    <!-- Search Input -->
                    <div class="relative">
                        <input type="text"
                               placeholder="Search through history..."
                               class="w-full pl-12 pr-4 py-4 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 text-lg"/>
                        <svg class="w-6 h-6 absolute left-3 top-1/2 transform -translate-y-1/2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <!-- Advanced Filters -->
                    <div class="mt-4 flex flex-wrap gap-4">
                        <!-- Time Period -->
                        <select class="px-4 py-2 rounded-lg border border-amber-200 bg-amber-50 text-amber-900">
                            <option>All Time Periods</option>
                            <option>Ancient (3000 BCE - 500 CE)</option>
                            <option>Medieval (500 - 1500)</option>
                            <option>Early Modern (1500 - 1800)</option>
                            <option>Modern (1800 - Present)</option>
                        </select>

                        <!-- Region -->
                        <select class="px-4 py-2 rounded-lg border border-amber-200 bg-amber-50 text-amber-900">
                            <option>All Regions</option>
                            <option>Europe</option>
                            <option>Asia</option>
                            <option>Africa</option>
                            <option>Americas</option>
                            <option>Oceania</option>
                        </select>

                        <!-- Event Type -->
                        <select class="px-4 py-2 rounded-lg border border-amber-200 bg-amber-50 text-amber-900">
                            <option>All Events</option>
                            <option>Wars & Conflicts</option>
                            <option>Scientific Discoveries</option>
                            <option>Cultural Movements</option>
                            <option>Political Events</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Results Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Categories & Filters -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Categories -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-bold text-amber-900 mb-4">Categories</h3>
                        <div class="space-y-2">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="rounded text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">World Wars</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="rounded text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">Scientific Discoveries</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="rounded text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">Revolutions</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="rounded text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">Art & Culture</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="rounded text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">Ancient Civilizations</span>
                            </label>
                        </div>
                    </div>

                    <!-- Sort Options -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-bold text-amber-900 mb-4">Sort By</h3>
                        <div class="space-y-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="sort" class="text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">Date (Oldest First)</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="sort" class="text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">Date (Newest First)</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="sort" class="text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">Historical Significance</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="sort" class="text-amber-600 focus:ring-amber-500"/>
                                <span class="text-amber-800">Most Viewed</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Map & Results -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Interactive Map -->

                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-bold text-amber-900 mb-4">Historical Events Map</h3>

    <div class="relative bg-amber-50 rounded-lg overflow-hidden" style="height: 500px;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Winkel_triple_projection_SW.jpg" alt="World Map" class="w-full h-full object-cover" id="world-map"/>

                            <!-- AFRICA -->
        <div class="absolute top-[47%] left-[49.5%] map-marker" data-name="Africa" onclick="showContinentName(event)">
            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
        </div>

        <!-- ASIA -->
        <div class="absolute top-[38%] left-[63%] map-marker" data-name="Asia" onclick="showContinentName(event)">
            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
        </div>

        <!-- EUROPE -->
        <div class="absolute top-[30%] left-[47.5%] map-marker" data-name="Europe" onclick="showContinentName(event)">
            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
        </div>

        <!-- NORTH AMERICA -->
        <div class="absolute top-[28%] left-[27%] map-marker" data-name="North America" onclick="showContinentName(event)">
            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
        </div>

        <!-- SOUTH AMERICA -->
        <div class="absolute top-[63%] left-[36%] map-marker" data-name="South America" onclick="showContinentName(event)">
            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
        </div>

        <!-- OCEANIA -->
        <div class="absolute top-[72%] left-[83%] map-marker" data-name="Oceania" onclick="showContinentName(event)">
            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
        </div>

        <!-- ANTARCTICA -->
        <div class="absolute top-[90%] left-[52%] map-marker" data-name="Antarctica" onclick="showContinentName(event)">
            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
        </div>


    </div>
    <div id="continent-name" class="mt-4 text-lg font-bold text-amber-700"></div>
    <div id="continent-events" class="mt-4 text-amber-800 text-base"></div>



                    <!-- Search Results -->
                    <div class="space-y-4">
                        <!-- Active Filters -->
                        <div class="flex flex-wrap gap-2">
                            <span class="filter-pill bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm">
                                Medieval Period ×
                            </span>
                            <span class="filter-pill bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm">
                                Europe ×
                            </span>
                            <span class="filter-pill bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm">
                                Cultural Movements ×
                            </span>
                        </div>

                        <!-- Results Cards -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex gap-4">
                                <img src="https://d2rdhxfof4qmbb.cloudfront.net/wp-content/uploads/20190613154740/Florence-feature.jpg" alt="Event Image" class="w-32 h-32 rounded-lg object-cover"/>
                                <div>
                                    <h4 class="text-xl font-bold text-amber-900">The Renaissance in Florence</h4>
                                    <p class="text-amber-700">1400 CE - 1600 CE | Florence, Italy</p>
                                    <p class="text-amber-800 mt-2">A cultural movement that profoundly affected European intellectual life in the early modern period...</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex gap-4">
                                <img src="https://clearlyreformed.org/static/88a4294d3d5662dfe98635a38bdc8b3b/crusades-1.jpg" alt="Event Image" class="w-32 h-32 rounded-lg object-cover"/>
                                <div>
                                    <h4 class="text-xl font-bold text-amber-900">The Crusades</h4>
                                    <p class="text-amber-700">1095 CE - 1291 CE | Mediterranean Region</p>
                                    <p class="text-amber-800 mt-2">A series of religious wars initiated, supported, and directed by the Latin Church...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
</body>
<script>
    const continentEvents = {
        "Africa": [
            "Nelson Mandela becomes President (1994)",
            "Egyptian Pyramids built (~2600 BC)",
            "Scramble for Africa (1881–1914)"
        ],
        "Asia": [
            "Mongol Empire expansion (1206–1368)",
            "Atomic bombings of Hiroshima and Nagasaki (1945)",
            "Silk Road trade flourishes (130 BC–1453 AD)"
        ],
        "Europe": [
            "Fall of the Roman Empire (476 AD)",
            "French Revolution (1789)",
            "World War II (1939–1945)"
        ],
        "North America": [
            "American Declaration of Independence (1776)",
            "Civil Rights Movement (1950s–1960s)",
            "9/11 Terrorist Attacks (2001)"
        ],
        "South America": [
            "Incan Empire peaks (1438–1533)",
            "Independence Movements (1810–1825)",
            "Brazil becomes Republic (1889)"
        ],
        "Oceania": [
            "British colonization of Australia (1788)",
            "Treaty of Waitangi signed in New Zealand (1840)",
            "Sydney Olympics (2000)"
        ],
        "Antarctica": [
            "First human reached South Pole (1911)",
            "Antarctic Treaty signed (1959)",
            "Scientific Research Stations established"
        ]
    };

    function showContinentName(event) {
        const continentName = event.target.closest('.map-marker').getAttribute('data-name');
        document.getElementById('continent-name').innerText = "Selected Continent: " + continentName;

        const events = continentEvents[continentName] || [];
        const eventsList = events.map(event => `<li class="mb-1">📜 ${event}</li>`).join('');
        document.getElementById('continent-events').innerHTML = events.length > 0
            ? `<ul class="list-disc pl-5 mt-2">${eventsList}</ul>`
            : "<p class='text-gray-500 mt-2'>No historical events available for this continent.</p>";
    }
</script>

</html>
