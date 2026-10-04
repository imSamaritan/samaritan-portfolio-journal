const CACHE_NAME = 'portfolio-pwa-v3';
const PRECACHE_ASSETS = [
    './offline.html',
    './css/custom.css',
    './assets/logo.png',
    './icons/icon-192.png',
    './icons/icon-512.png',
    './icons/favicon.png',
    './icons/favicon-32.png',
    './icons/favicon-16.png',
    './favicon.ico',
    'https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css',
    'https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js'
];

// 1. Install event: Pre-cache static assets
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(PRECACHE_ASSETS);
        }).then(() => self.skipWaiting())
    );
});

// 2. Activate event: Clean old caches
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cache) => {
                    if (cache !== CACHE_NAME) {
                        return caches.delete(cache);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

// 3. Fetch event: Stale-while-revalidate for assets, Network-first for pages
self.addEventListener('fetch', (event) => {
    if (event.request.method !== 'GET') return;

    // Handle HTML navigations (pages)
    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request)
                .then((networkResponse) => {
                    // Cache successful page visit for offline reading
                    return caches.open(CACHE_NAME).then((cache) => {
                        cache.put(event.request, networkResponse.clone());
                        return networkResponse;
                    });
                })
                .catch(() => {
                    return caches.match(event.request).then((cachedResponse) => {
                        return cachedResponse || caches.match('./offline.html');
                    });
                })
        );
        return;
    }

    // Static assets: cache-first with network fallback
    event.respondWith(
        caches.match(event.request).then((cachedResponse) => {
            return cachedResponse || fetch(event.request).then((networkResponse) => {
                return caches.open(CACHE_NAME).then((cache) => {
                    cache.put(event.request, networkResponse.clone());
                    return networkResponse;
                });
            });
        })
    );
});
