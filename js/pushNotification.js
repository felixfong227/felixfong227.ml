function pushNotification(msg,time){
    var notificationEl = document.querySelector(".notification");
    var time = (typeof time !== 'undefined') ?  time : 2500;
    notificationEl.textContent = msg;
    notificationEl.classList.add("on");
    setTimeout(function(){
        notificationEl.classList.remove("on");
        notificationEl.textContent = null;
    },time);
}