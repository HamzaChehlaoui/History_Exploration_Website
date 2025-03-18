<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeTrekker - Terms and Conditions</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4645/4645379.png">
    <script src="https://cdn.tailwindcss.com"></script>
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

        .time-badge {
            background: conic-gradient(from 0deg, #78350f, #b45309, #92400e, #78350f);
        }

        .section-divider {
            height: 2px;
            background: linear-gradient(to right, transparent, #b45309, transparent);
        }
    </style>
</head>
<body class="font-serif bg-gradient-to-b from-amber-50 to-amber-100 min-h-screen">
    <!-- Navigation Bar -->
    <header class="bg-amber-900 text-amber-100 px-4 py-3 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="https://cdn-icons-png.flaticon.com/512/4645/4645379.png" alt="TimeTrekker Logo" class="h-10 w-10">
                <span class="text-2xl font-bold">TimeTrekker</span>
            </div>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Home</a></li>
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Explore</a></li>
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Timeline</a></li>
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Community</a></li>
                    <li><a href="#" class="hover:text-amber-300 transition-colors">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Page Header -->
    <div class="bg-amber-800 py-12 px-4 shadow-md">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-amber-100 mb-4">Terms and Conditions</h1>
            <p class="text-amber-200">Last updated: March 15, 2025</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="parchment p-8 rounded-lg shadow-md border border-amber-300 mb-8">
            <p class="text-amber-800 italic mb-6">
                Welcome to TimeTrekker. These Terms and Conditions govern your use of our time travel services, website, and applications. By using TimeTrekker, you agree to these Terms in full. If you disagree with these Terms or any part of them, you must not use our services.
            </p>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">1</span>
                    </span>
                    Temporal Jurisdiction
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    By using TimeTrekker services, you acknowledge and accept that you are subject to the laws and regulations of all temporal jurisdictions you visit, including but not limited to the Temporal Preservation Act of 2020 and the Historical Integrity Convention.
                </p>
                <p class="text-amber-800">
                    TimeTrekker maintains compliance with all international and intertemporal regulations regarding time travel, observation, and artifact collection. Users must adhere to all local temporal laws during their travels.
                </p>
            </div>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">2</span>
                    </span>
                    Non-Interference Policy
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    TimeTrekker adopts a strict non-interference policy. Members are prohibited from taking actions that could alter the historical timeline or influence historical events. This includes, but is not limited to:
                </p>
                <ul class="list-disc pl-8 text-amber-800 mb-4 space-y-2">
                    <li>Introducing modern technology to historical periods</li>
                    <li>Revealing future events to historical figures</li>
                    <li>Preventing documented historical events from occurring</li>
                    <li>Removing significant artifacts from their historical context</li>
                    <li>Engaging in activities that could result in paradoxes</li>
                </ul>
                <p class="text-amber-800">
                    Violation of this policy may result in immediate termination of membership and potential temporal corrective actions.
                </p>
            </div>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">3</span>
                    </span>
                    Artifact Collection and Documentation
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    TimeTrekker permits the collection of historical artifacts under strict guidelines:
                </p>
                <ul class="list-disc pl-8 text-amber-800 mb-4 space-y-2">
                    <li>Only artifacts that are documented as "lost to history" may be collected</li>
                    <li>Collection must not disrupt known historical events or discoveries</li>
                    <li>All artifacts must be properly documented and registered with TimeTrekker's Artifact Registry</li>
                    <li>Artifacts must be preserved according to TimeTrekker's conservation protocols</li>
                </ul>
                <p class="text-amber-800">
                    TimeTrekker reserves the right to confiscate any artifacts collected in violation of these guidelines and to take appropriate disciplinary action.
                </p>
            </div>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">4</span>
                    </span>
                    Health and Safety
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    TimeTrekker prioritizes the health and safety of its members. All travelers must:
                </p>
                <ul class="list-disc pl-8 text-amber-800 mb-4 space-y-2">
                    <li>Undergo complete medical examinations before each temporal journey</li>
                    <li>Receive all required vaccinations and immunizations for the target time period</li>
                    <li>Carry approved emergency health kits at all times</li>
                    <li>Follow all safety protocols established for specific time periods</li>
                    <li>Report any health issues encountered during travel immediately to TimeTrekker Health Services</li>
                </ul>
                <p class="text-amber-800">
                    TimeTrekker is not liable for health complications resulting from failure to follow these guidelines.
                </p>
            </div>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">5</span>
                    </span>
                    Membership and Fees
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    Membership with TimeTrekker is subject to the following terms:
                </p>
                <ul class="list-disc pl-8 text-amber-800 mb-4 space-y-2">
                    <li>Membership fees are due annually and are non-refundable</li>
                    <li>Additional fees apply for specific temporal expeditions</li>
                    <li>Members must maintain good standing to access TimeTrekker services</li>
                    <li>TimeTrekker reserves the right to revoke membership for violations of these Terms</li>
                </ul>
                <p class="text-amber-800">
                    Current membership fees and expedition costs are available in the Member Portal.
                </p>
            </div>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">6</span>
                    </span>
                    Termination of Service
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    TimeTrekker reserves the right to terminate or suspend your account and access to our services immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
                </p>
                <p class="text-amber-800">
                    Upon termination, your right to use the service will immediately cease. If you wish to terminate your account, you may simply discontinue using the service.
                </p>
            </div>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">7</span>
                    </span>
                    Limitation of Liability
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    In no event shall TimeTrekker, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from:
                </p>
                <ul class="list-disc pl-8 text-amber-800 mb-4 space-y-2">
                    <li>Your access to or use of or inability to access or use the service</li>
                    <li>Any conduct or content of any third party on the service</li>
                    <li>Temporal displacement or timeline inconsistencies</li>
                    <li>Unauthorized access, use or alteration of your transmissions or content</li>
                </ul>
                <p class="text-amber-800">
                    Time travel inherently carries risks, and TimeTrekker cannot guarantee absolute safety or timeline stability.
                </p>
            </div>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">8</span>
                    </span>
                    Amendments to Terms
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days' notice prior to any new terms taking effect.
                </p>
                <p class="text-amber-800">
                    By continuing to access or use our service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the service.
                </p>
            </div>

            <div class="mb-8 scroll-trigger">
                <h2 class="text-2xl font-bold text-amber-900 mb-4 flex items-center">
                    <span class="inline-block w-8 h-8 bg-amber-800 rounded-full flex items-center justify-center mr-3">
                        <span class="text-amber-100 font-bold text-sm">9</span>
                    </span>
                    Contact Us
                </h2>
                <div class="section-divider mb-4"></div>
                <p class="text-amber-800 mb-4">
                    If you have any questions about these Terms, please contact us at:
                </p>
                <ul class="list-disc pl-8 text-amber-800 mb-4 space-y-2">
                    <li>Email: legal@timetrekker.com</li>
                    <li>Temporal Communication: TC-42985-LEGAL</li>
                    <li>Physical Address: TimeTrekker Headquarters, 1500 Chronos Avenue, San Francisco, CA 94105</li>
                </ul>
            </div>

            <div class="mt-10 pt-10 border-t border-amber-300 text-center">
                <div class="flex justify-center mb-6">
                    <div class="w-24 h-24 rounded-full time-badge flex items-center justify-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/4645/4645379.png" alt="TimeTrekker Seal" class="h-16 w-16">
                    </div>
                </div>
                <p class="text-amber-800 font-semibold">
                    By using TimeTrekker's services, you acknowledge that you have read these Terms and agree to be bound by them.
                </p>
            </div>
        </div>

        <div class="flex justify-center space-x-4 mt-8">
            <a href="#" class="px-6 py-3 bg-amber-800 text-amber-100 rounded-md hover:bg-amber-700 transition-colors font-medium">Accept Terms</a>
            <a href="#" class="px-6 py-3 bg-amber-100 text-amber-800 border border-amber-800 rounded-md hover:bg-amber-200 transition-colors font-medium">Decline</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-amber-900 text-amber-100 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-lg font-semibold mb-4">TimeTrekker</h4>
                    <p class="text-amber-300 text-sm">Exploring history one moment at a time.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Home</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Explore Eras</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Community</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">About Us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Historical Database</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Artifact Registry</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Time Travel Guidelines</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Preservation Techniques</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-amber-300 hover:text-amber-100 font-bold">Terms of Service</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Privacy Policy</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Temporal Ethics</a></li>
                        <li><a href="#" class="text-amber-300 hover:text-amber-100">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-amber-800 mt-8 pt-6 text-center text-sm text-amber-400">
                <p>&copy; 2025 TimeTrekker. All rights reserved. Temporal Displacement License #TT-42985-C.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Simple scroll animation for timeline items
        document.addEventListener('DOMContentLoaded', function() {
            let scrollTriggers = document.querySelectorAll('.scroll-trigger');

            let checkVisibility = () => {
                scrollTriggers.forEach(element => {
                    let position = element.getBoundingClientRect();

                    // Check if element is in viewport 
                    if(position.top < window.innerHeight - 100) {
                        element.classList.add('visible');
                    }
                });
            };

            // Check visibility on load
            checkVisibility();

            // Check visibility on scroll
            window.addEventListener('scroll', checkVisibility);
        });
    </script>
</body>
</html>
