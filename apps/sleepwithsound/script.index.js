window.onload = function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
        var back = xhttp.responseXML;
        var version = back.querySelector("widget").getAttribute("version");
        var description = back.querySelector("description").textContent;
        document.querySelector(".version").textContent = version;
        document.querySelector(".description").textContent = description;
        }
    };
    xhttp.open("GET", "https://rawgit.com/moongod101/sleepwithsound/master/config.xml", true);
    xhttp.send();

};