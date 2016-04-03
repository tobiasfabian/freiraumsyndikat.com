// _klaenge.js


function randomNumber(min, max) {
  return Math.random() * (max - min) + min;
}


function Klang(element) {

  var _scrollY = 0;
  var _scroll = 0;

  function position() {
    var left = randomNumber(10, 90);
    var top = randomNumber(20, 90);
    var rotate = randomNumber(-360, 360);
    var scale = randomNumber(0.8, 1);
    if (window.matchMedia('(max-width: 34rem)').matches) {
      scale = randomNumber(0.5, 0.7);
    }
    requestAnimationFrame(function () {
      element.style.left = left + '%';
      element.style.top = top + '%';
      element.style.transform = 'rotate(' + rotate + 'deg) scale(' + scale + ')';
    });
  }

  function show() {
    element.style.opacity = '1';
  }

  function hide() {
    element.style.opacity = '0';
  }

  function handleScroll () {
    if (_scrollY === 0) {
      _scrollY = window.scrollY;
    } else {
      _scroll = _scrollY - window.scrollY;
    }
    if (_scroll < -100 || _scroll > 100) {
      _scrollY = 0;
      _scroll = 0;
      position();
    }
  }


  window.addEventListener('scroll', handleScroll);


  position();


  this.position = position;
  this.show = show;
  this.hide = hide;


}


function getKlaenge() {
  var klangElements = document.querySelectorAll('.klang');
  var klaenge = [];
  if (klangElements.length > 0) {
    for(var i = 0; i < klangElements.length; i++) {
      klaenge.push(new Klang(klangElements[i]));
    }
  }
  return klaenge;
}


function positionKlaenge() {

  var klaenge = getKlaenge();

  for(var i = 0; i < klaenge.length; i++) {
    klaenge[i].position();
  }

}
