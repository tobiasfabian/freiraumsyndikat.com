// _startseite.js


(function () {


  var element = document.querySelector('.startseite');

  if (element) {
    setTimeout(function() {
      setInterval(positionKlaenge, 2000);
    }, 4000);
  }


}());
