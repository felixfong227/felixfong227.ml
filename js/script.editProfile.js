window.onload = function () {

  var action = true;

  if(action === true){
    action = false;
    var El = document.querySelectorAll(".assets img");

    for(var i=0;i<El.length;i++){

      var el = El[i];

      el.addEventListener("click",function () {
        document.querySelector(".notif").textContent = "Updating please wait...";

        var ajax = new XMLHttpRequest();
        var $source = this.getAttribute("src");
        ajax.open("GET","../manager/updateProfilePicture.php?icon=" + $source);

        ajax.send();
        ajax.onreadystatechange = function () {

          if(ajax.status == 200 && ajax.readyState == 2){
            document.querySelector(".notif").textContent = "";
            document.querySelector(".profileBar .userInfo .icon").style.background = "url("+$source+")no-repeat center";
            document.querySelector(".profileBar .userInfo .icon").style.backgroundSize = "100% 100%";
          }


        }

      });


    }

  }else{


    document.querySelector("body").addEventListener("click",function (e) {
      e.preventDefault();
    });


  }


}