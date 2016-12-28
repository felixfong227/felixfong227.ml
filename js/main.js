var myAgeElement = document.querySelector(".content .aboutMyself .myAge");
var DataObject = new Date();
myAgeElement.textContent = DataObject.getFullYear() - 2001;
var ponies = document.querySelector(".ponies");

var rainbowdash = document.querySelector(".ponies .rainbow img");

rainbowdash.addEventListener("touchmove",function (e) {
    e.preventDefault();
    var positionX = e.changedTouches[0].clientX,
        positionY = e.changedTouches[0].clientY

    ponies.style.left = positionX + "px";
    ponies.style.top = positionY + "px";
});

// Using the service worker
if( "serviceWorker" in navigator){

    // Good to go now
    navigator.serviceWorker
        .register("../sw.js")
        .then(function (registration) {
            console.log("[Service Worker Success]: Success to register");
        })
        .catch(function (error) {
           console.log("[Service Worker Error]: Fail to register: ", error);
            pushNotification("Please reload the page for offline use case");
        });

}else{
    console.log("Service worker do NOT support your current browser");
}