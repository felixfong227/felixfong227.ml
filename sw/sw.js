var CACHE_NAME = 'cache-v1.1';
var urlsToCache = [
    '/',
    "/js/main.js",
    "/css/aboutMySelf.css",
    "/css/contackLinks.css",
    "/css/content.css",
    "/css/hero.css",
    "/css/index.css",
    "/css/ponies.css",
    "/css/projectsIMade.css",
    "http://i.imgur.com/NHelBgr.png"
];

self.addEventListener('install', function(event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function(cache) {
                return cache.addAll(urlsToCache);
            })
    );
});