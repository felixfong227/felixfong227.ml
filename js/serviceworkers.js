if ('serviceWorker' in navigator) {
    console.log("Your browser support Service Worker!");
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/sw/sw.js').then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }).catch(function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
        });
    });
}else{
    console.log("Your DO NOT support Service Worker!");
}