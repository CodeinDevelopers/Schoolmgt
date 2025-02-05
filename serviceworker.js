var staticCacheName = "ramom-school-pwa-" + new Date().getTime();
var filesToCache = [
    '/uploads/appIcons/icon-48x48.png',
    '/uploads/appIcons/icon-72x72.png',
    '/uploads/appIcons/icon-96x96.png',
    '/uploads/appIcons/icon-144x144.png',
    '/uploads/appIcons/icon-192x192.png',
    '/uploads/appIcons/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("ramom-school-pwa-")))
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
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
