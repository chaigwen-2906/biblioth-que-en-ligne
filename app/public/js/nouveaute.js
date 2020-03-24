function myFunction(imgs) {
    var etendreImg = document.getElementsByClassName("etendreImg");
    var imgText = document.getElementsByClassName("imgtext");
    etendreImg[0].src = imgs.src;
    imgText[0].innerHTML = imgs.alt;
    etendreImg[0].parentElement.style.display = "block";
  }