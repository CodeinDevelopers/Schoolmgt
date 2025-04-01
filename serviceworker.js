var staticCacheName = "acamedium-pwa-" + new Date().getTime();
var filesToCache = [
    '/offline.html',
    '/uploads/appIcons/icon-48x48.png',
    '/uploads/appIcons/icon-72x72.png',
    '/uploads/appIcons/icon-96x96.png',
    '/uploads/appIcons/icon-144x144.png',
    '/uploads/appIcons/icon-192x192.png',
    '/uploads/appIcons/icon-512x512.png',

];
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    );
});

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
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    return response;
                }
                return fetch(event.request)
                    .catch(() => {
                        if (event.request.mode === 'navigate') {
                            return caches.match('/offline.html');
                        }
                        if (event.request.url.match(/\.(jpg|jpeg|png|gif|svg)$/)) {
                            return caches.match('/uploads/appIcons/icon-192x192.png');
                        }
                        return new Response('Content not available offline', {
                            status: 503,
                            statusText: 'Service Unavailable'
                        });
                    });
            })
    );
});