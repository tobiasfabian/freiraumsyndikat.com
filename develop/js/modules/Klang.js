function randomNumber(min, max) {
  return Math.random() * (max - min) + min;
}


class Klang {

  constructor(element) {
    const klang = this;

    var _scrollY = 0;
    var _scroll = 0;

    this.element = element;

    function handleScroll() {
      if (_scrollY === 0) {
        _scrollY = window.scrollY;
      } else {
        _scroll = _scrollY - window.scrollY;
      }
      if (_scroll < -100 || _scroll > 100) {
        _scrollY = 0;
        _scroll = 0;
        klang.position();
      }
    }

    window.addEventListener('scroll', handleScroll);

    requestAnimationFrame(() => {
      klang.position();
    })
  }


  position() {
    const { element } = this;

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

  show() {
    const { element } = this;
    element.style.opacity = '1';
  }

  hide() {
    const { element } = this;
    element.style.opacity = '0';
  }
}

export default Klang;
