const CACHE = 'landmark-v1';
const ASSETS = [
    '/',
    '/country/cambodia',
    '/country/philippines',
    '/favorites',
];

self.addEventListener('install', e => {
    e.waitUntil(
        caches.open(CACHE).then(cache => cache.addAll(ASSETS))
    );
});

self.addEventListener('fetch', e => {
    e.respondWith(
        caches.match(e.request).then(cached => {
            return cached || fetch(e.request).catch(() => {
                return new Response('Offline — please reconnect.', {
                    headers: { 'Content-Type': 'text/plain' }
                });
            });
        })
    );
});