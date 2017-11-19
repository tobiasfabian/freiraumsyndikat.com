// _startseite.js


(function () {

  function showHideCite() {
    citeElements[currentCite].classList.add('is-hidden');
    currentCite = currentCite + 1 >= citeElements.length ? 0 : currentCite + 1;
    citeElements[currentCite].classList.remove('is-hidden');
  }


  var element = document.querySelector('.startseite');
  var citeElements = document.querySelectorAll('.startseite--cite');
  var currentCite = 0;


  if (element) {
    setTimeout(function() {
      setInterval(positionKlaenge, 2000);
      setInterval(showHideCite, 16000);
    }, 4000);
  }


}());
