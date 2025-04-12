@extends('Visiteur.master')

@section('content')
<style>
    .map-container {
        position: relative;
        width: 100%;
        height: 500px;
        overflow: hidden;
        border-radius: 0.5rem;
    }

    #map {
        height: 100%;
        width: 100%;
    }

    #info {
        position: absolute;
        bottom: 10px;
        width: 100%;
        text-align: center;
        color: #fff;
        background-color: rgba(0,0,0,0.5);
        padding: 5px;
        font-size: 14px;
        pointer-events: none;
        z-index: 10;
    }

    #tooltip {
        position: absolute;
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 8px;
        pointer-events: none;
        display: none;
        color: #1a202c;
        font-size: 14px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        z-index: 100;
    }
</style>

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
                <!-- Interactive Google Map -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-amber-900 mb-4">Historical Events Map</h3>

                    <div class="map-container">
                        <div id="map"></div>
                        <div id="info">Drag to move | Scroll to zoom</div>
                        <div id="tooltip"></div>
                    </div>

                    <div id="region-name" class="mt-4 text-lg font-bold text-amber-700"></div>
                    <div id="region-events" class="mt-4 text-amber-800 text-base"></div>
                </div>

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
                            <img src="/api/placeholder/128/128" alt="Renaissance Image" class="w-32 h-32 rounded-lg object-cover"/>
                            <div>
                                <h4 class="text-xl font-bold text-amber-900">The Renaissance in Florence</h4>
                                <p class="text-amber-700">1400 CE - 1600 CE | Florence, Italy</p>
                                <p class="text-amber-800 mt-2">A cultural movement that profoundly affected European intellectual life in the early modern period...</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex gap-4">
                            <img src="/api/placeholder/128/128" alt="Crusades Image" class="w-32 h-32 rounded-lg object-cover"/>
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

<!-- Google Maps Implementation -->
<script>
    // Sample historical events data with expanded list and Wikipedia links
    let historicalEvents = [
        {
            title: "The Renaissance in Florence",
            period: "1400 CE - 1600 CE",
            location: "Florence, Italy",
            position: { lat: 43.7696, lng: 11.2558 },
            description: "A cultural movement that profoundly affected European intellectual life.",
            wikiLink: "https://en.wikipedia.org/wiki/Renaissance"
        },
        {
            title: "The Crusades",
            period: "1095 CE - 1291 CE",
            location: "Jerusalem",
            position: { lat: 31.7683, lng: 35.2137 },
            description: "A series of religious wars initiated by the Latin Church.",
            wikiLink: "https://en.wikipedia.org/wiki/Crusades"
        },
        {
            title: "Industrial Revolution",
            period: "1760 CE - 1840 CE",
            location: "Manchester, England",
            position: { lat: 53.4808, lng: -2.2426 },
            description: "The transition to new manufacturing processes in Europe and the United States.",
            wikiLink: "https://en.wikipedia.org/wiki/Industrial_Revolution"
        },
        {
            title: "French Revolution",
            period: "1789 CE - 1799 CE",
            location: "Paris, France",
            position: { lat: 48.8566, lng: 2.3522 },
            description: "A period of radical social and political upheaval in French history.",
            wikiLink: "https://en.wikipedia.org/wiki/French_Revolution"
        },
        {
            title: "Ancient Rome",
            period: "753 BCE - 476 CE",
            location: "Rome, Italy",
            position: { lat: 41.9028, lng: 12.4964 },
            description: "An ancient civilization that grew from a small town on central Italy's Tiber River into an empire.",
            wikiLink: "https://en.wikipedia.org/wiki/Ancient_Rome"
        },
        // New historical events with the same properties
        {
            title: "The Silk Road",
            period: "130 BCE - 1453 CE",
            location: "Chang'an (Xi'an), China",
            position: { lat: 34.3416, lng: 108.9398 },
            description: "An ancient network of trade routes connecting the East and West.",
            wikiLink: "https://en.wikipedia.org/wiki/Silk_Road"
        },
        {
            title: "The Inca Empire",
            period: "1438 CE - 1533 CE",
            location: "Cusco, Peru",
            position: { lat: -13.5320, lng: -71.9675 },
            description: "The largest empire in pre-Columbian America with advanced engineering and administrative systems.",
            wikiLink: "https://en.wikipedia.org/wiki/Inca_Empire"
        },
        {
            title: "The Byzantine Empire",
            period: "330 CE - 1453 CE",
            location: "Constantinople (Istanbul), Turkey",
            position: { lat: 41.0082, lng: 28.9784 },
            description: "The continuation of the Roman Empire in its eastern provinces during Late Antiquity and the Middle Ages.",
            wikiLink: "https://en.wikipedia.org/wiki/Byzantine_Empire"
        },
        {
            title: "The Maya Civilization",
            period: "2000 BCE - 1697 CE",
            location: "Chichen Itza, Mexico",
            position: { lat: 20.6843, lng: -88.5677 },
            description: "A Mesoamerican civilization known for its art, architecture, mathematics, and astronomical systems.",
            wikiLink: "https://en.wikipedia.org/wiki/Maya_civilization"
        },
        {
            title: "Ancient Egypt",
            period: "3100 BCE - 332 BCE",
            location: "Cairo, Egypt",
            position: { lat: 30.0444, lng: 31.2357 },
            description: "An ancient civilization concentrated along the lower Nile River, known for its monumental architecture and complex religious beliefs.",
            wikiLink: "https://en.wikipedia.org/wiki/Ancient_Egypt"
        },
        {
            title: "The Mongol Empire",
            period: "1206 CE - 1368 CE",
            location: "Karakorum, Mongolia",
            position: { lat: 47.2075, lng: 102.8447 },
            description: "The largest contiguous land empire in history, founded by Genghis Khan.",
            wikiLink: "https://en.wikipedia.org/wiki/Mongol_Empire"
        },
        {
            title: "The Islamic Golden Age",
            period: "8th century CE - 14th century CE",
            location: "Baghdad, Iraq",
            position: { lat: 33.3152, lng: 44.3661 },
            description: "A period of cultural, economic, and scientific flourishing in the history of Islam.",
            wikiLink: "https://en.wikipedia.org/wiki/Islamic_Golden_Age"
        }
    ];

    // Initialize map function that will be called after API loads
    function initMap() {
        console.log('Initializing map');

        // Check if map container exists
        let mapContainer = document.getElementById('map');
        if (!mapContainer) {
            console.error('Map container not found');
            return;
        }

        // Create the map centered on a global view
        let map = new google.maps.Map(mapContainer, {
            zoom: 2,
            center: { lat: 30, lng: 10 },
            mapTypeId: "terrain",
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            streetViewControl: false
        });

        // Define the SVG path for a location pin marker (similar to the reference image)
        let pinSVGPath = "M12,0C5.4,0,0,5.4,0,12c0,7.2,12,24,12,24s12-16.8,12-24C24,5.4,18.6,0,12,0z M12,18c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S15.3,18,12,18z";

        // Add markers for each historical event with smaller location pin design and no animation
        historicalEvents.forEach(event => {
            // Create a custom marker using SVG path for location pin
            let marker = new google.maps.Marker({
                position: event.position,
                map: map,
                title: event.title,
                // No animation specified
                icon: {
                    path: pinSVGPath,
                    fillColor: '#FF0000',
                    fillOpacity: 1,
                    strokeColor: '#FFFFFF',
                    strokeWeight: 1.5,
                    // Reduced scale for smaller size
                    scale: 0.8,
                    // Adjust the anchor point for pin markers
                    anchor: new google.maps.Point(12, 24)
                }
            });

            // Create an info window with an embedded Wikipedia link in the description
            let infoWindow = new google.maps.InfoWindow({
                content: `
                    <div style="max-width: 300px; padding: 10px;">
                        <h3 style="font-weight: bold; color: #78350f; margin-top: 0;">${event.title}</h3>
                        <p style="color: #92400e; margin: 5px 0;"><strong>${event.period}</strong> | ${event.location}</p>
                        <p style="margin-bottom: 8px;">${event.description}</p>
                        <div style="text-align: right;">
                            <a href="${event.wikiLink}" target="_blank" style="display: inline-block; background-color: #FF0000; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 12px;">Read on Wikipedia</a>
                        </div>
                    </div>
                `,
                maxWidth: 320
            });

            // Add click event to open info window
            marker.addListener("click", () => {
                // Open info window
                infoWindow.open(map, marker);

                // Update region info below the map with styled description and link
                document.getElementById("region-name").textContent = event.location;

                // Clear previous content
                let regionEvents = document.getElementById("region-events");
                regionEvents.innerHTML = '';

                // Create description text
                let descText = document.createElement('span');
                descText.textContent = `${event.title} (${event.period}): ${event.description} `;
                regionEvents.appendChild(descText);

                // Create styled Wikipedia link
                let wikiLink = document.createElement('a');
                wikiLink.href = event.wikiLink;
                wikiLink.textContent = 'Read more on Wikipedia';
                wikiLink.target = '_blank';
                wikiLink.style.color = '#FF0000';
                wikiLink.style.fontWeight = 'bold';
                wikiLink.style.textDecoration = 'underline';
                regionEvents.appendChild(wikiLink);
            });

            // No hover animation effect
        });

        // Update region info when map is clicked
        map.addListener("click", () => {
            // Clear region info
            document.getElementById("region-name").textContent = "";
            document.getElementById("region-events").textContent = "Click on a marker to see historical events from that region.";
        });

        // Set initial region info
        document.getElementById("region-events").textContent = "Click on a marker to see historical events from that region.";

        // Add a legend to explain the markers
        let legend = document.createElement('div');
        legend.style.padding = '10px';
        legend.style.margin = '10px';
        legend.style.backgroundColor = 'white';
        legend.style.border = '1px solid #ccc';
        legend.style.borderRadius = '5px';
        legend.style.position = 'absolute';
        legend.style.bottom = '30px';
        legend.style.right = '10px';
        legend.style.fontSize = '12px';
        legend.style.boxShadow = '0 2px 6px rgba(0,0,0,0.3)';

        let pinIconHTML = `
            <svg width="16" height="16" viewBox="0 0 24 24" style="vertical-align: middle; margin-right: 5px;">
                <path d="${pinSVGPath}" fill="#FF0000" stroke="#FFFFFF" stroke-width="1"></path>
            </svg>
        `;

        legend.innerHTML = `
            <div style="display: flex; align-items: center; margin-bottom: 5px;">
                ${pinIconHTML}
                <span>Historical Event</span>
            </div>
            <div style="font-style: italic; color: #666; font-size: 11px;">Click any marker for details</div>
        `;

        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);

        console.log('Map initialized successfully with smaller location pin markers and no animation');
    }

    // Load Google Maps API script
    document.addEventListener('DOMContentLoaded', function() {
        // Create script element
        let script = document.createElement('script');
        const MAP_API_KEY = "{{ env('MAP_KEY') }}";
        script.src = 'https://maps.googleapis.com/maps/api/js?key=' + MAP_API_KEY + "&callback=initMap";
        script.async = true;
        script.defer = true;

        // Add error handling
        script.onerror = function() {
            console.error('Google Maps API failed to load');
            let mapDiv = document.getElementById('map');
            if (mapDiv) {
                mapDiv.innerHTML = '<div style="padding: 20px; text-align: center;">Failed to load Google Maps. Please check your API key and internet connection.</div>';
            }
        };

        // Append script to body
        document.body.appendChild(script);
    });
</script>
@endsection
