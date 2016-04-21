// _main_header.js


(function () {


  var element = document.querySelector('.main_header');
  var hamburgerElement = element.querySelector('.main_header--hamburger');

  hamburgerElement.addEventListener('click', function () {
    if (element.classList.contains('active')) {
      hamburgerElement.setAttribute('aria-label', hamburgerElement.dataset.labelOpen);
      element.classList.remove('active');
    } else {
      hamburgerElement.setAttribute('aria-label', hamburgerElement.dataset.labelClose);
      element.classList.add('active');
    }
  });


}());
