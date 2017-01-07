// Set a name for the current cache
var cacheName = 'v2';

// Default files to always cache
var cacheFiles = [
    '/',
    '/index.html',
    '/css/aboutMySelf.css',
    '/css/contackLinks.css',
    '/css/content.css',
    '/css/hero.css',
    '/css/index.css',
    '/css/notification.css',
    '/css/ponies.css',
    '/css/projectsIMade.css',
    '/js/main.js',
    '/js/pushNotification.js',
    '/js/loadScreen.js',
    '/src/rainbow.png',
    '/src/banner.jpg',
    '/src/javascript.png',
    'https://fonts.googleapis.com/css?family=Indie+Flower',
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
    'https://avatars3.githubusercontent.com/u/13918481?v=3',
]


self.addEventListener('install', function(e) {
    console.log('[ServiceWorker] Installed');

    // e.waitUntil Delays the event until the Promise is resolved
    e.waitUntil(

        // Open the cache
        caches.open(cacheName).then(function(cache) {

            // Add all the default files to the cache
            console.log('[ServiceWorker] Caching cacheFiles');
            return cache.addAll(cacheFiles);
        })
    ); // end e.waitUntil
});


self.addEventListener('activate', function(e) {
    console.log('[ServiceWorker] Activated');
    e.waitUntil(

        // Get all the cache keys (cacheName)
        caches.keys().then(function(cacheNames) {
            return Promise.all(cacheNames.map(function(thisCacheName) {

                // If a cached item is saved under a previous cacheName
                if (thisCacheName !== cacheName) {

                    // Delete that cached file
                    console.log('[ServiceWorker] Removing Cached Files from Cache - ', thisCacheName);
                    return caches.delete(thisCacheName);
                }
            }));
        })
    ); // end e.waitUntil

});


self.addEventListener('fetch', function(e) {
    console.log('[ServiceWorker] Fetch', e.request.url);

    // e.respondWidth Responds to the fetch event
    e.respondWith(

        // Check in cache for the request being made
        caches.match(e.request)


            .then(function(response) {

                // If the request is in the cache
                if ( response ) {
                    console.log("[ServiceWorker] Found in Cache", e.request.url);
                    // Return the cached version
                    return response;
                }

                // If the request is NOT in the cache, fetch and cache

                var requestClone = e.request.clone();
                fetch(requestClone)
                    .then(function(response) {

                        if ( !response ) {
                            console.log("[ServiceWorker] No response from fetch ")
                            return response;
                        }

                        var responseClone = response.clone();

                        //  Open the cache
                        caches.open(cacheName).then(function(cache) {

                            // Put the fetched response in the cache
                            cache.put(e.request, responseClone);
                            console.log('[ServiceWorker] New Data Cached', e.request.url);

                            // Return the response
                            return response;

                        }); // end caches.open

                    })
                    .catch(function(err) {
                        console.log('[ServiceWorker] Error Fetching & Caching New Data', err);
                    });


            }) // end caches.match(e.request)
    ); // end e.respondWith
});