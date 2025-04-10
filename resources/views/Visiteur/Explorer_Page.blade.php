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
                    <!-- Interactive 3D Map -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-bold text-amber-900 mb-4">Historical Events Map</h3>

                        <div class="map-container">
                            <div id="globe"></div>
                            <div id="info">Drag to rotate | Scroll to zoom</div>
                            <div id="tooltip"></div>
                        </div>

                        <div id="continent-name" class="mt-4 text-lg font-bold text-amber-700"></div>
                        <div id="continent-events" class="mt-4 text-amber-800 text-base"></div>
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

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
        // Historical events data by continent
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

        // Landmark coordinates (latitude, longitude) for major historical sites
        const historicalMarkers = [
            { name: "Giza Pyramids", continent: "Africa", lat: 29.9773, lon: 31.1325, color: 0x993399 },
            { name: "Great Wall of China", continent: "Asia", lat: 40.4319, lon: 116.5704, color: 0xff0000 },
            { name: "Colosseum", continent: "Europe", lat: 41.8902, lon: 12.4922, color: 0x3366ff },
            // { name: "Machu Picchu", continent: "South America", lat: -13.1631, lon: -72.5450, color: 0x009900 },
            // { name: "Statue of Liberty", continent: "North America", lat: 40.6892, lon: -74.0445, color: 0x993399 },
            { name: "Sydney Opera House", continent: "Oceania", lat: -33.8568, lon: 151.2153, color: 0xffcc00 },
            { name: "Amundsen-Scott Station", continent: "Antarctica", lat: -90, lon: 0, color: 0xffffff }
        ];

        // Initialize the scene
        let scene, camera, renderer, globe, raycaster, pointer, markers = [];

        // Wait for DOM to fully load
        document.addEventListener('DOMContentLoaded', function() {
            // Make sure Three.js is loaded
            if (typeof THREE === 'undefined') {
                console.error('Three.js library not loaded');
                return;
            }

            // Check if required DOM elements exist
            const globeElement = document.getElementById('globe');
            const tooltipElement = document.getElementById('tooltip');
            const continentNameElement = document.getElementById('continent-name');
            const continentEventsElement = document.getElementById('continent-events');

            if (!globeElement || !tooltipElement || !continentNameElement || !continentEventsElement) {
                console.error('Required DOM elements not found');
                return;
            }

            init();
            animate();
        });

        function initEnhancedGlobe() {
    // Create scene
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0xf8fafc); // Light background matching site theme

    // Create camera
    const container = document.getElementById('globe');
    const width = container.clientWidth || 500;
    const height = 500;

    camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
    camera.position.z = 5;

    // Create renderer with improved settings
    renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
        logarithmicDepthBuffer: true
    });
    renderer.setSize(width, height);
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.2;
    container.appendChild(renderer.domElement);

    // Handle window resize
    window.addEventListener('resize', () => {
        const width = container.clientWidth;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    });

    // Create texture loader
    const textureLoader = new THREE.TextureLoader();
    textureLoader.crossOrigin = 'anonymous';

    // Earth Group
    const earthGroup = new THREE.Group();
    scene.add(earthGroup);

    // 1. MAIN EARTH SPHERE WITH HIGH-QUALITY TEXTURES
    // --------------------------------------------
    const earthGeometry = new THREE.SphereGeometry(2, 64, 64);

    // Using higher quality textures
    const earthMaterial = new THREE.MeshPhongMaterial({
        map: null,
        bumpMap: null,
        bumpScale: 0.05,
        specularMap: null,
        specular: new THREE.Color(0x333333),
        shininess: 15,
        transparent: true
    });

    // Load Earth textures with proper error handling
    Promise.all([
        new Promise((resolve, reject) => {
            textureLoader.load(
                'https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_atmos_2048.jpg',
                texture => resolve({ type: 'map', texture }),
                undefined,
                err => {
                    console.error('Error loading Earth texture', err);
                    resolve({ type: 'map', texture: null });
                }
            );
        }),
        new Promise((resolve, reject) => {
            textureLoader.load(
                'https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_normal_2048.jpg',
                texture => resolve({ type: 'normalMap', texture }),
                undefined,
                err => {
                    console.error('Error loading normal map texture', err);
                    resolve({ type: 'normalMap', texture: null });
                }
            );
        }),
        new Promise((resolve, reject) => {
            textureLoader.load(
                'https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_specular_2048.jpg',
                texture => resolve({ type: 'specularMap', texture }),
                undefined,
                err => {
                    console.error('Error loading specular map texture', err);
                    resolve({ type: 'specularMap', texture: null });
                }
            );
        })
    ]).then(results => {
        results.forEach(result => {
            if (result.texture) {
                earthMaterial[result.type] = result.texture;
            }
        });
        earthMaterial.needsUpdate = true;
    });

    const earthMesh = new THREE.Mesh(earthGeometry, earthMaterial);
    earthGroup.add(earthMesh);

    // 2. CLOUD LAYER
    // --------------------------------------------
    const cloudGeometry = new THREE.SphereGeometry(2.02, 64, 64);
    const cloudMaterial = new THREE.MeshPhongMaterial({
        map: null,
        transparent: true,
        opacity: 0.4,
        alphaMap: null
    });

    // Load cloud texture
    textureLoader.load(
        'https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_clouds_1024.png',
        texture => {
            cloudMaterial.map = texture;
            cloudMaterial.alphaMap = texture;
            cloudMaterial.needsUpdate = true;
        },
        undefined,
        err => console.error('Error loading cloud texture', err)
    );

    const cloudMesh = new THREE.Mesh(cloudGeometry, cloudMaterial);
    earthGroup.add(cloudMesh);

    // 3. ATMOSPHERE GLOW
    // --------------------------------------------
    const atmosphereGeometry = new THREE.SphereGeometry(2.1, 64, 64);
    const atmosphereMaterial = new THREE.ShaderMaterial({
        uniforms: {
            glowColor: { value: new THREE.Color(0x93cfef) },
            coefficient: { value: 0.1 },
            power: { value: 2.0 }
        },
        vertexShader: `
            varying vec3 vNormal;
            void main() {
                vNormal = normalize(normalMatrix * normal);
                gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
            }
        `,
        fragmentShader: `
            uniform vec3 glowColor;
            uniform float coefficient;
            uniform float power;
            varying vec3 vNormal;
            void main() {
                float intensity = pow(coefficient - dot(vNormal, vec3(0.0, 0.0, 1.0)), power);
                gl_FragColor = vec4(glowColor, intensity);
            }
        `,
        blending: THREE.AdditiveBlending,
        side: THREE.BackSide,
        transparent: true
    });

    const atmosphere = new THREE.Mesh(atmosphereGeometry, atmosphereMaterial);
    earthGroup.add(atmosphere);

    // 4. NIGHT LIGHTS (OPTIONAL)
    // --------------------------------------------
    const nightGeometry = new THREE.SphereGeometry(2.001, 64, 64);
    const nightMaterial = new THREE.MeshBasicMaterial({
        map: null,
        transparent: true,
        opacity: 0.8,
        blending: THREE.AdditiveBlending
    });

    // Load night lights texture
    textureLoader.load(
        'https://raw.githubusercontent.com/mrdoob/three.js/master/examples/textures/planets/earth_lights_2048.png',
        texture => {
            nightMaterial.map = texture;
            nightMaterial.needsUpdate = true;
        },
        undefined,
        err => console.error('Error loading night lights texture', err)
    );

    const nightMesh = new THREE.Mesh(nightGeometry, nightMaterial);
    earthGroup.add(nightMesh);

    // 5. LIGHTING
    // --------------------------------------------
    // Ambient light
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.3);
    scene.add(ambientLight);

    // Directional light (Sun)
    const sunLight = new THREE.DirectionalLight(0xffffff, 1.2);
    sunLight.position.set(5, 3, 5);
    scene.add(sunLight);

    // Optional: Soft light from opposite direction
    const fillLight = new THREE.DirectionalLight(0xffffff, 0.3);
    fillLight.position.set(-5, -3, -5);
    scene.add(fillLight);

    // Add historical markers on top of all layers
    addHistoricalMarkers();

    // Initialize raycaster and mouse for interaction
    raycaster = new THREE.Raycaster();
    pointer = new THREE.Vector2();

    // 6. ENHANCED CONTROLS
    // --------------------------------------------
    let isDragging = false;
    let previousMousePosition = { x: 0, y: 0 };
    let rotationSpeed = { x: 0, y: 0 };
    const damping = 0.95; // Damping factor for smooth deceleration
    const tooltipElement = document.getElementById('tooltip');

    // Mouse events for rotation with inertia
    renderer.domElement.addEventListener('mousedown', (e) => {
        isDragging = true;
        previousMousePosition = {
            x: e.clientX,
            y: e.clientY
        };

        // Stop any ongoing inertia
        rotationSpeed.x = 0;
        rotationSpeed.y = 0;
    });

    renderer.domElement.addEventListener('mouseup', () => {
        isDragging = false;
    });

    renderer.domElement.addEventListener('mouseleave', () => {
        isDragging = false;
        tooltipElement.style.display = 'none';
    });

    renderer.domElement.addEventListener('mousemove', (e) => {
        // Update pointer for raycaster
        const rect = renderer.domElement.getBoundingClientRect();
        pointer.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        pointer.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;

        // Handle dragging for rotation with inertia
        if (isDragging) {
            const deltaMove = {
                x: e.clientX - previousMousePosition.x,
                y: e.clientY - previousMousePosition.y
            };

            // Set rotation speed based on mouse movement
            rotationSpeed.y = deltaMove.x * 0.001;
            rotationSpeed.x = deltaMove.y * 0.001;

            previousMousePosition = {
                x: e.clientX,
                y: e.clientY
            };
        }
    });

    // Enhanced wheel event for smooth zooming
    renderer.domElement.addEventListener('wheel', (e) => {
        e.preventDefault();

        // Calculate zoom amount with easing
        const zoomSpeed = 0.0007;
        const zoomAmount = e.deltaY * zoomSpeed;

        // Apply zoom with limits
        if ((camera.position.z > 3 && zoomAmount < 0) ||
            (camera.position.z < 10 && zoomAmount > 0)) {
            // Use exponential zooming for more natural feel
            camera.position.z *= Math.pow(1.1, zoomAmount);
        }
    });

    // Click event for marker selection
    renderer.domElement.addEventListener('click', (e) => {
        const rect = renderer.domElement.getBoundingClientRect();
        pointer.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        pointer.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;

        checkMarkerIntersection();
    });

    // Double-click to reset position
    renderer.domElement.addEventListener('dblclick', () => {
        // Reset rotation and speeds
        gsap.to(earthGroup.rotation, {
            x: 0,
            y: 0,
            duration: 1.5,
            ease: "power2.out"
        });

        gsap.to(camera.position, {
            z: 5,
            duration: 1.5,
            ease: "power2.out"
        });

        rotationSpeed.x = 0;
        rotationSpeed.y = 0;
    });

    // Animate function for continuous updates
    function animateGlobe() {
        requestAnimationFrame(animateGlobe);

        // Apply rotation with inertia
        if (!isDragging) {
            // Apply damping to slow down rotation over time
            rotationSpeed.x *= damping;
            rotationSpeed.y *= damping;

            // Stop very small rotations to prevent eternal tiny movements
            if (Math.abs(rotationSpeed.x) < 0.00001) rotationSpeed.x = 0;
            if (Math.abs(rotationSpeed.y) < 0.00001) rotationSpeed.y = 0;
        }

        // Apply rotation to earth group
        earthGroup.rotation.x += rotationSpeed.x;
        earthGroup.rotation.y += rotationSpeed.y;

        // Slow baseline rotation when not being dragged
        if (!isDragging && rotationSpeed.y === 0) {
            earthGroup.rotation.y += 0.0005;
        }

        // Rotate clouds slightly faster than Earth for effect
        cloudMesh.rotation.y += 0.0001;

        // Check for marker hover
        raycaster.setFromCamera(pointer, camera);
        const intersects = raycaster.intersectObjects(markers);

        // Reset all markers to original size
        markers.forEach(marker => {
            marker.scale.set(1, 1, 1);
        });

        // Update tooltip visibility and content
        if (intersects.length > 0) {
            const marker = intersects[0].object;

            // Pulse animation for hovered marker
            marker.scale.set(1.2 + Math.sin(Date.now() * 0.01) * 0.2,
                            1.2 + Math.sin(Date.now() * 0.01) * 0.2,
                            1.2 + Math.sin(Date.now() * 0.01) * 0.2);

            // Update tooltip content and position
            tooltipElement.innerHTML = `<strong>${marker.userData.name}</strong><br>${marker.userData.continent}`;
            tooltipElement.style.display = 'block';

            // Position tooltip near the mouse
            const vector = new THREE.Vector3();
            vector.setFromMatrixPosition(marker.matrixWorld);
            vector.project(camera);

            const rect = renderer.domElement.getBoundingClientRect();
            const x = (vector.x * 0.5 + 0.5) * rect.width + rect.left;
            const y = (-vector.y * 0.5 + 0.5) * rect.height + rect.top - 30;

            tooltipElement.style.left = `${x}px`;
            tooltipElement.style.top = `${y}px`;
        } else {
            tooltipElement.style.display = 'none';
        }

        renderer.render(scene, camera);
    }

    // Start animation
    animateGlobe();
    }

    // Function to create enhanced historical markers
    function addEnhancedHistoricalMarkers() {
    historicalMarkers.forEach(marker => {
        // Create marker with more complex geometry
        const markerGroup = new THREE.Group();

        // Base sphere
        const markerGeometry = new THREE.SphereGeometry(0.04, 16, 16);
        const markerMaterial = new THREE.MeshPhongMaterial({
            color: marker.color,
            emissive: marker.color,
            emissiveIntensity: 0.3,
            shininess: 30
        });
        const markerMesh = new THREE.Mesh(markerGeometry, markerMaterial);

        // Add glow effect
        const glowGeometry = new THREE.SphereGeometry(0.05, 16, 16);
        const glowMaterial = new THREE.ShaderMaterial({
            uniforms: {
                glowColor: { value: new THREE.Color(marker.color) },
                coefficient: { value: 0.5 },
                power: { value: 1.0 }
            },
            vertexShader: `
                varying vec3 vNormal;
                void main() {
                    vNormal = normalize(normalMatrix * normal);
                    gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                }
            `,
            fragmentShader: `
                uniform vec3 glowColor;
                uniform float coefficient;
                uniform float power;
                varying vec3 vNormal;
                void main() {
                    float intensity = pow(coefficient - dot(vNormal, vec3(0.0, 0.0, 1.0)), power);
                    gl_FragColor = vec4(glowColor, intensity * 0.7);
                }
            `,
            blending: THREE.AdditiveBlending,
            transparent: true
        });

        const glowMesh = new THREE.Mesh(glowGeometry, glowMaterial);
        markerGroup.add(markerMesh);
        markerGroup.add(glowMesh);

        // Create small pin effect
        const pinGeometry = new THREE.CylinderGeometry(0.005, 0.02, 0.1, 8);
        const pinMaterial = new THREE.MeshPhongMaterial({ color: marker.color });
        const pinMesh = new THREE.Mesh(pinGeometry, pinMaterial);

        // Position elements
        const position = latLongToVector3(marker.lat, marker.lon, 2);
        markerGroup.position.copy(position);

        // Calculate orientation to make pin point outward from globe center
        const origin = new THREE.Vector3(0, 0, 0);
        const direction = new THREE.Vector3().subVectors(position, origin).normalize();

        pinMesh.quaternion.setFromUnitVectors(new THREE.Vector3(0, 1, 0), direction);

        // Position pin slightly above main marker
        pinMesh.position.copy(position);
        markerGroup.add(pinMesh);

        // Add property to identify marker
        markerGroup.userData = {
            name: marker.name,
            continent: marker.continent,
            description: marker.description || "A significant historical location"
        };

        // Add marker to scene and to markers array
        scene.add(markerGroup);
        markers.push(markerGroup);
    });
    }

    // Replace your existing init function with this
    function init() {
    initEnhancedGlobe();
    }

        function latLongToVector3(lat, lon, radius) {
            const phi = (90 - lat) * (Math.PI / 180);
            const theta = (lon + 180) * (Math.PI / 180);

            const x = -radius * Math.sin(phi) * Math.cos(theta);
            const z = radius * Math.sin(phi) * Math.sin(theta);
            const y = radius * Math.cos(phi);

            return new THREE.Vector3(x, y, z);
        }

        function addHistoricalMarkers() {
            historicalMarkers.forEach(marker => {
                // Create marker geometry and material
                const markerGeometry = new THREE.SphereGeometry(0.05, 16, 16);
                const markerMaterial = new THREE.MeshBasicMaterial({ color: marker.color });
                const markerMesh = new THREE.Mesh(markerGeometry, markerMaterial);

                // Position marker on globe based on lat/lon
                const position = latLongToVector3(marker.lat, marker.lon, 2);
                markerMesh.position.copy(position);

                // Add property to identify marker
                markerMesh.userData = {
                    name: marker.name,
                    continent: marker.continent
                };

                // Add marker to scene and to markers array
                scene.add(markerMesh);
                markers.push(markerMesh);
            });
        }

        function checkMarkerIntersection() {
            raycaster.setFromCamera(pointer, camera);

            const intersects = raycaster.intersectObjects(markers);

            if (intersects.length > 0) {
                const marker = intersects[0].object;
                showContinentInfo(marker.userData.continent);
            }
        }

        function showContinentInfo(continentName) {
            const continentNameElement = document.getElementById('continent-name');
            const continentEventsElement = document.getElementById('continent-events');

            if (!continentNameElement || !continentEventsElement) return;

            continentNameElement.innerText = "Selected Continent: " + continentName;

            const events = continentEvents[continentName] || [];
            const eventsList = events.map(event => `<li class="mb-1">📜 ${event}</li>`).join('');
            continentEventsElement.innerHTML = events.length > 0
                ? `<ul class="list-disc pl-5 mt-2">${eventsList}</ul>`
                : "<p class='text-gray-500 mt-2'>No historical events available for this continent.</p>";
        }

        function animate() {
            if (!scene || !camera || !renderer || !globe) return;

            requestAnimationFrame(animate);

            // Slow auto-rotation
            globe.rotation.y += 0.001;

            // Check for marker hover
            raycaster.setFromCamera(pointer, camera);
            const intersects = raycaster.intersectObjects(markers);
            const tooltipElement = document.getElementById('tooltip');

            if (!tooltipElement) return;

            // Reset all markers to original size
            markers.forEach(marker => {
                marker.scale.set(1, 1, 1);
            });

            // Update tooltip visibility and content
            if (intersects.length > 0) {
                const marker = intersects[0].object;

                // Highlight the hovered marker
                marker.scale.set(1.5, 1.5, 1.5);

                // Update tooltip content and position
                tooltipElement.innerHTML = `<strong>${marker.userData.name}</strong><br>${marker.userData.continent}`;
                tooltipElement.style.display = 'block';

                // Position tooltip near the mouse
                const vector = new THREE.Vector3();
                vector.setFromMatrixPosition(marker.matrixWorld);
                vector.project(camera);

                const rect = renderer.domElement.getBoundingClientRect();
                const x = (vector.x * 0.5 + 0.5) * rect.width + rect.left;
                const y = (-vector.y * 0.5 + 0.5) * rect.height + rect.top - 30;

                tooltipElement.style.left = `${x}px`;
                tooltipElement.style.top = `${y}px`;
            } else {
                tooltipElement.style.display = 'none';
            }

            renderer.render(scene, camera);
        }
</script>

</body>
@endsection
