import Klang from './Klang';

var ensembleElement = document.querySelector('.ensemble');

function Mitglied (element) {
  var _element = element;
  var _klang = new Klang(_element.querySelector('.klang'));
  var _mousemoveCounter = 0;
  var _mousemoveX = 0;
  var _mousemoveY = 0;
  function handleMousmove (e) {
    if (_mousemoveX === 0) {
      _mousemoveX = e.clientX;
    }
    if (_mousemoveY === 0) {
      _mousemoveY = e.clientY;
    }
    if (_mousemoveX !== 0 && _mousemoveY !== 0) {
      _mousemoveCounter = (_mousemoveX - e.clientX) + (_mousemoveY - e.clientY);
    }
    if (_mousemoveCounter < -100 || _mousemoveCounter > 100) {
      _mousemoveX = 0;
      _mousemoveY = 0;
      _klang.position();
    }
  }
  function show() {
    _element.classList.add('active');
    _klang.show();
    _klang.position();
  }
  function hide() {
    _element.classList.remove('active');
    _klang.hide();
  }
  function changeActive () {
    if (!_element.classList.contains('active')) {
      show();
    } else {
      hide();
    }
  }
  _element.addEventListener('mouseover', show);
  _element.addEventListener('mouseout', hide);
  _element.addEventListener('focus', show);
  _element.addEventListener('click', changeActive);
  _element.addEventListener('mousemove', handleMousmove);
  document.addEventListener('touchstart', function (e) {
    if (e.target !== _element) {
      hide();
    }
  });
}

function setEventListeners() {
  for (var i = 0; i < ensembleMitgliedElements.length; i++) {
    new Mitglied(ensembleMitgliedElements[i]);
  }
}

if (ensembleElement) {
  var ensembleMitgliedElements = ensembleElement.querySelectorAll('li');
  setEventListeners();
}
