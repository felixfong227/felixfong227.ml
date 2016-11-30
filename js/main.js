var myAgeElement = document.querySelector(".content .aboutMyself .myAge");
var DataObject = new Date();
myAgeElement.textContent = DataObject.getFullYear() - 2001;