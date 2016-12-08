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