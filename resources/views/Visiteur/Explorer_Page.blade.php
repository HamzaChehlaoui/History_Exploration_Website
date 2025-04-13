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
                    <input type="text" id="search-input"
                        placeholder="Search through history..."
                        class="w-full pl-12 pr-4 py-4 rounded-lg border border-amber-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 text-lg"/>
                    <svg class="w-6 h-6 absolute left-3 top-1/2 transform -translate-y-1/2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <!-- Advanced Filters -->
                <div class="mt-4 flex flex-wrap gap-4">
                    <!-- Time Period -->
                    <select id="filter-period" class="px-4 py-2 rounded-lg border border-amber-200 bg-amber-50 text-amber-900">
                        <option>All Time Periods</option>
                        <option>Ancient (3000 BCE - 500 CE)</option>
                        <option>Medieval (500 - 1500)</option>
                        <option>Early Modern (1500 - 1800)</option>
                        <option>Modern (1800 - Present)</option>
                    </select>

                    <!-- Region -->
                    <select id="filter-region" class="px-4 py-2 rounded-lg border border-amber-200 bg-amber-50 text-amber-900">
                        <option>All Regions</option>
                        <option>Europe</option>
                        <option>Asia</option>
                        <option>Africa</option>
                        <option>Americas</option>
                        <option>Oceania</option>
                        <option>Middle East</option>
                        <option>North America</option>
                        <option>South America</option>
                    </select>

                    <!-- Event Type -->
                    <select id="filter-type" class="px-4 py-2 rounded-lg border border-amber-200 bg-amber-50 text-amber-900">
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

            <div class="lg:col-span-1 space-y-6">
                <!-- Categories -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-amber-900 mb-4">Categories</h3>
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="category-checkbox rounded text-amber-600 focus:ring-amber-500" value="Wars & Conflicts"/>
                            <span class="text-amber-800">World Wars</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="category-checkbox rounded text-amber-600 focus:ring-amber-500" value="Scientific Discoveries"/>
                            <span class="text-amber-800">Scientific Discoveries</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="category-checkbox rounded text-amber-600 focus:ring-amber-500" value="Political Events"/>
                            <span class="text-amber-800">Revolutions</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="category-checkbox rounded text-amber-600 focus:ring-amber-500" value="Cultural Movements"/>
                            <span class="text-amber-800">Art & Culture</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="category-checkbox rounded text-amber-600 focus:ring-amber-500" value="Ancient"/>
                            <span class="text-amber-800">Ancient Civilizations</span>
                        </label>
                    </div>
                </div>
                <div id="region-name" class="mt-4 text-lg font-bold text-amber-700"></div>
                <div id="region-events" class="mt-4 text-amber-800 text-base"></div>

                <div id="search-results" class="space-y-4">

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

                </div>

                <!-- Search Results -->
                <div class="space-y-4">

                    <div id="active-filters" class="flex flex-wrap gap-2">

                    </div>

                    <div id="search-results" class="space-y-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Global variables
    let map;
    let markers = [];
    let activeInfoWindow = null;

    let historicalEvents = [
        {
            title: "The Renaissance in Florence",
            period: "1400 CE - 1600 CE",
            era: "CE",
            continent: "Europe",
            location: "Florence, Italy",
            position: { lat: 43.7696, lng: 11.2558 },
            description: "A cultural movement that profoundly affected European intellectual life.",
            wikiLink: "https://en.wikipedia.org/wiki/Renaissance",
            category: "Cultural Movements",
            significance: 90,
            views: 12500
        },
        {
            title: "The Crusades",
            period: "1095 CE - 1291 CE",
            era: "CE",
            continent: "Middle East",
            location: "Jerusalem",
            position: { lat: 31.7683, lng: 35.2137 },
            description: "A series of religious wars initiated by the Latin Church.",
            wikiLink: "https://en.wikipedia.org/wiki/Crusades",
            category: "Wars & Conflicts",
            significance: 85,
            views: 10200
        },
        {
            title: "Industrial Revolution",
            period: "1760 CE - 1840 CE",
            era: "CE",
            continent: "Europe",
            location: "Manchester, England",
            position: { lat: 53.4808, lng: -2.2426 },
            description: "The transition to new manufacturing processes in Europe and the United States.",
            wikiLink: "https://en.wikipedia.org/wiki/Industrial_Revolution",
            category: "Scientific Discoveries",
            significance: 95,
            views: 15600
        },
        {
            title: "French Revolution",
            period: "1789 CE - 1799 CE",
            era: "CE",
            continent: "Europe",
            location: "Paris, France",
            position: { lat: 48.8566, lng: 2.3522 },
            description: "A period of radical social and political upheaval in French history.",
            wikiLink: "https://en.wikipedia.org/wiki/French_Revolution",
            category: "Political Events",
            significance: 93,
            views: 14800
        },
        {
            title: "Ancient Rome",
            period: "753 BCE - 476 CE",
            era: "Mixed",
            continent: "Europe",
            location: "Rome, Italy",
            position: { lat: 41.9028, lng: 12.4964 },
            description: "An ancient civilization that grew into a vast empire.",
            wikiLink: "https://en.wikipedia.org/wiki/Ancient_Rome",
            category: "Ancient",
            significance: 98,
            views: 19200
        },
        {
            title: "The Silk Road",
            period: "130 BCE - 1453 CE",
            era: "Mixed",
            continent: "Asia",
            location: "Chang'an (Xi'an), China",
            position: { lat: 34.3416, lng: 108.9398 },
            description: "An ancient trade route connecting East and West.",
            wikiLink: "https://en.wikipedia.org/wiki/Silk_Road",
            category: "Cultural Movements",
            significance: 88,
            views: 9500
        },
        {
            title: "The Inca Empire",
            period: "1438 CE - 1533 CE",
            era: "CE",
            continent: "South America",
            location: "Cusco, Peru",
            position: { lat: -13.5320, lng: -71.9675 },
            description: "Largest empire in pre-Columbian America.",
            wikiLink: "https://en.wikipedia.org/wiki/Inca_Empire",
            category: "Ancient",
            significance: 82,
            views: 8300
        },
        {
            title: "The Byzantine Empire",
            period: "330 CE - 1453 CE",
            era: "CE",
            continent: "Europe",
            location: "Istanbul, Turkey",
            position: { lat: 41.0082, lng: 28.9784 },
            description: "Eastern Roman Empire during the Middle Ages.",
            wikiLink: "https://en.wikipedia.org/wiki/Byzantine_Empire",
            category: "Ancient",
            significance: 87,
            views: 7900
        },
        {
            title: "The Maya Civilization",
            period: "2000 BCE - 1697 CE",
            era: "Mixed",
            continent: "North America",
            location: "Chichen Itza, Mexico",
            position: { lat: 20.6843, lng: -88.5677 },
            description: "Advanced civilization in Mesoamerica.",
            wikiLink: "https://en.wikipedia.org/wiki/Maya_civilization",
            category: "Ancient",
            significance: 86,
            views: 9800
        },
        {
            title: "Ancient Egypt",
            period: "3100 BCE - 332 BCE",
            era: "BCE",
            continent: "Africa",
            location: "Cairo, Egypt",
            position: { lat: 30.0444, lng: 31.2357 },
            description: "One of the oldest and most influential civilizations.",
            wikiLink: "https://en.wikipedia.org/wiki/Ancient_Egypt",
            category: "Ancient",
            significance: 96,
            views: 18500
        },
        {
            title: "The Mongol Empire",
            period: "1206 CE - 1368 CE",
            era: "CE",
            continent: "Asia",
            location: "Karakorum, Mongolia",
            position: { lat: 47.2075, lng: 102.8447 },
            description: "The largest contiguous land empire in history.",
            wikiLink: "https://en.wikipedia.org/wiki/Mongol_Empire",
            category: "Wars & Conflicts",
            significance: 90,
            views: 11200
        },
        {
            title: "The Islamic Golden Age",
            period: "8th century CE - 14th century CE",
            era: "CE",
            continent: "Middle East",
            location: "Baghdad, Iraq",
            position: { lat: 33.3152, lng: 44.3661 },
            description: "A golden era of science, culture and innovation.",
            wikiLink: "https://en.wikipedia.org/wiki/Islamic_Golden_Age",
            category: "Cultural Movements",
            significance: 89,
            views: 8700
        }
    ];

    function initMap() {
        console.log('Initializing map');

        // Check if map container exists
        let mapContainer = document.getElementById('map');
        if (!mapContainer) {
            console.error('Map container not found');
            return;
        }

        // Create the map centered on a global view
        map = new google.maps.Map(mapContainer, {
            zoom: 2,
            center: { lat: 30, lng: 10 },
            mapTypeId: "terrain",
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            streetViewControl: false
        });

        // Define the SVG path for a location pin marker
        let pinSVGPath = "M12,0C5.4,0,0,5.4,0,12c0,7.2,12,24,12,24s12-16.8,12-24C24,5.4,18.6,0,12,0z M12,18c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S15.3,18,12,18z";

        markers = [];

        historicalEvents.forEach(event => {

            let marker = new google.maps.Marker({
                position: event.position,
                map: map,
                title: event.title,
                icon: {
                    path: pinSVGPath,
                    fillColor: '#FF0000',
                    fillOpacity: 1,
                    strokeColor: '#FFFFFF',
                    strokeWeight: 1.5,
                    scale: 0.8,
                    anchor: new google.maps.Point(12, 24)
                }
            });


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


            marker.addListener("click", () => {

                if (activeInfoWindow) {

                    activeInfoWindow.close();
                }


                infoWindow.open(map, marker);
                activeInfoWindow = infoWindow;

                document.getElementById("region-name").textContent = event.location;


                let regionEvents = document.getElementById("region-events");
                regionEvents.innerHTML = '';


                let descText = document.createElement('span');
                descText.textContent = `${event.title} (${event.period}): ${event.description} `;
                regionEvents.appendChild(descText);


                let wikiLink = document.createElement('a');
                wikiLink.href = event.wikiLink;
                wikiLink.textContent = 'Read more on Wikipedia';
                wikiLink.target = '_blank';
                wikiLink.style.color = '#FF0000';
                wikiLink.style.fontWeight = 'bold';
                wikiLink.style.textDecoration = 'underline';
                regionEvents.appendChild(wikiLink);
            });


            markers.push({
                marker: marker,
                event: event,
                infoWindow: infoWindow
            });
        });


        map.addListener("click", () => {

            if (activeInfoWindow) {
                activeInfoWindow.close();
                activeInfoWindow = null;
            }

            document.getElementById("region-name").textContent = "";
            document.getElementById("region-events").textContent = "Click on a marker to see historical events from that region.";
        });

        document.getElementById("region-events").textContent = "Click on a marker to see historical events from that region.";

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

        console.log('Map initialized successfully with markers');

        updateSearchResults(historicalEvents);
    }

    function filterEvents() {

        let period = document.getElementById('filter-period').value;
        let region = document.getElementById('filter-region').value;
        let eventType = document.getElementById('filter-type').value;
        let searchTerm = document.getElementById('search-input').value.toLowerCase();


        let checkedCategories = [];
        document.querySelectorAll('.category-checkbox:checked').forEach(checkbox => {
            checkedCategories.push(checkbox.value);
        });


        let sortOption = null;
        document.querySelectorAll('input[name="sort"]:checked').forEach(radio => {
            sortOption = radio.value;
        });


        let filtered = historicalEvents.filter(event => {

            if (searchTerm && !event.title.toLowerCase().includes(searchTerm) &&
                !event.description.toLowerCase().includes(searchTerm) &&
                !event.location.toLowerCase().includes(searchTerm)) {
                return false;
            }

            if (period !== 'All Time Periods') {
                if (period === 'Ancient (3000 BCE - 500 CE)' && event.era !== 'BCE' && event.era !== 'Mixed') {
                    return false;
                } else if (period === 'Medieval (500 - 1500)' &&
                        !(event.period.includes('CE') &&
                            parseInt(event.period.split(' ')[0]) >= 500 &&
                            parseInt(event.period.split(' ')[0]) <= 1500)) {
                    return false;
                } else if (period === 'Early Modern (1500 - 1800)' &&
                        !(event.period.includes('CE') &&
                            parseInt(event.period.split(' ')[0]) >= 1500 &&
                            parseInt(event.period.split(' ')[0]) <= 1800)) {
                    return false;
                } else if (period === 'Modern (1800 - Present)' &&
                        !(event.period.includes('CE') && parseInt(event.period.split(' ')[0]) >= 1800)) {
                    return false;
                }
            }

            if (region !== 'All Regions' && event.continent !== region) {
                return false;
            }

            if (eventType !== 'All Events' && event.category !== eventType) {
                return false;
            }

            if (checkedCategories.length > 0 && !checkedCategories.includes(event.category)) {
                return false;
            }

            return true;
        });

        if (sortOption) {
            filtered.sort((a, b) => {
                switch(sortOption) {
                    case 'oldest':
                        let aYear = parseInt(a.period.split(' ')[0]);
                        let bYear = parseInt(b.period.split(' ')[0]);
                        return (a.era === 'BCE' ? -aYear : aYear) - (b.era === 'BCE' ? -bYear : bYear);
                    case 'newest':

                        let aYearDesc = parseInt(a.period.split(' ')[0]);
                        let bYearDesc = parseInt(b.period.split(' ')[0]);
                        return (b.era === 'BCE' ? -bYearDesc : bYearDesc) - (a.era === 'BCE' ? -aYearDesc : aYearDesc);
                    case 'significance':
                        return b.significance - a.significance;
                    case 'views':
                        return b.views - a.views;
                    default:
                        return 0;
                }
            });
        }

        return filtered;
    }

    function updateMapMarkers(filteredEvents) {

        let filteredEventTitles = new Set(filteredEvents.map(event => event.title));

        markers.forEach(item => {
            if (filteredEventTitles.has(item.event.title)) {
                item.marker.setMap(map);
            } else {
                item.marker.setMap(null);
            }
        });

        if (activeInfoWindow) {
            activeInfoWindow.close();
            activeInfoWindow = null;
        }

        document.getElementById("region-name").textContent = "";
        document.getElementById("region-events").textContent = "Click on a marker to see historical events from that region.";
    }

    function updateSearchResults(filteredEvents) {
        let resultsContainer = document.getElementById('search-results');

        resultsContainer.innerHTML = '';

        if (filteredEvents.length === 0) {

            resultsContainer.innerHTML = `
                <div class="bg-white rounded-xl shadow-md p-6">
                    <p class="text-amber-800">No historical events found matching your filters. Try adjusting your search criteria.</p>
                </div>
            `;
            return;
        }


    }

    function updateActiveFilters() {
        let activeFiltersContainer = document.getElementById('active-filters');
        activeFiltersContainer.innerHTML = '';

        let period = document.getElementById('filter-period').value;
        let region = document.getElementById('filter-region').value;
        let eventType = document.getElementById('filter-type').value;

        if (period !== 'All Time Periods') {
            let pill = createFilterPill(period);
            activeFiltersContainer.appendChild(pill);
        }

        if (region !== 'All Regions') {
            let pill = createFilterPill(region);
            activeFiltersContainer.appendChild(pill);
        }

        if (eventType !== 'All Events') {
            let pill = createFilterPill(eventType);
            activeFiltersContainer.appendChild(pill);
        }

        document.querySelectorAll('.category-checkbox:checked').forEach(checkbox => {
            let pill = createFilterPill(checkbox.value);
            activeFiltersContainer.appendChild(pill);
        });
    }

    function createFilterPill(text) {
        let pill = document.createElement('span');
        pill.className = 'filter-pill bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm';
        pill.innerHTML = `${text} ×`;
        pill.addEventListener('click', () => {

            if (text === document.getElementById('filter-period').value) {
                document.getElementById('filter-period').value = 'All Time Periods';
            } else if (text === document.getElementById('filter-region').value) {
                document.getElementById('filter-region').value = 'All Regions';
            } else if (text === document.getElementById('filter-type').value) {
                document.getElementById('filter-type').value = 'All Events';
            } else {

                document.querySelectorAll('.category-checkbox').forEach(checkbox => {
                    if (checkbox.value === text) {
                        checkbox.checked = false;
                    }
                });
            }
            applyFilters();
        });
        return pill;
    }


    function applyFilters() {
        let filteredEvents = filterEvents();
        updateMapMarkers(filteredEvents);
        updateSearchResults(filteredEvents);
        updateActiveFilters();
    }


    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('filter-period').addEventListener('change', applyFilters);
        document.getElementById('filter-region').addEventListener('change', applyFilters);
        document.getElementById('filter-type').addEventListener('change', applyFilters);
        document.getElementById('search-input').addEventListener('input', applyFilters);

        document.querySelectorAll('.category-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', applyFilters);
        });

        document.querySelectorAll('input[name="sort"]').forEach(radio => {
            radio.addEventListener('change', applyFilters);
        });

        let script = document.createElement('script');
        let MAP_API_KEY = "{{ env('MAP_KEY') }}";
        script.src = 'https://maps.googleapis.com/maps/api/js?key=' + MAP_API_KEY + "&callback=initMap";
        script.async = true;
        script.defer = true;

        script.onerror = function() {
            console.error('Google Maps API failed to load');
            let mapDiv = document.getElementById('map');
            if (mapDiv) {
                mapDiv.innerHTML = '<div style="padding: 20px; text-align: center;">Failed to load Google Maps. Please check your API key and internet connection.</div>';
            }
        };

        document.body.appendChild(script);
    });
</script>

@endsection
