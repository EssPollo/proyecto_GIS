window.onload = function() {
    var bodyElement = document.body;
    var randomNumber = Math.floor(Math.random() * 9) + 1;
    bodyElement.style.backgroundImage = "url('/images/home/wallpaper_" + randomNumber + ".png')";
}