// Cache name with timestamp for version control
var staticCacheName = "acamedium-pwa-" + new Date().getTime();

// Files to cache
var filesToCache = [
    '/offline.html',
    '/uploads/appIcons/icon-48x48.png',
    '/uploads/appIcons/icon-72x72.png',
    '/uploads/appIcons/icon-96x96.png',
    '/uploads/appIcons/icon-144x144.png',
    '/uploads/appIcons/icon-192x192.png',
    '/uploads/appIcons/icon-512x512.png',
    // Consider adding your CSS/JS core files here
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    );
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("acamedium-pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Return cached response if found
                if (response) {
                    return response;
                }
                
                // Otherwise try to fetch from network
                return fetch(event.request)
                    .catch(() => {
                        // Check if this is a navigation request
                        if (event.request.mode === 'navigate') {
                            // Return the offline page for navigation
                            return caches.match('/offline.html');
                        }
                        
                        // For image requests, you could return a default offline image
                        if (event.request.url.match(/\.(jpg|jpeg|png|gif|svg)$/)) {
                            return caches.match('/uploads/appIcons/icon-192x192.png');
                        }
                        
                        // For other requests, return a simple error response
                        return new Response('Content not available offline', {
                            status: 503,
                            statusText: 'Service Unavailable'
                        });
                    });
            })
    );
});