var pagenavElement = document.querySelector('.pagenav');
var pagenavAElements;

function scroll(e) {
  e.preventDefault();
  var hash = this.href.substr(this.href.search('#') + 1);
  var element = document.getElementById(hash);
  var top = element.offsetTop;
  if (window.matchMedia('(min-height: 50rem)').matches) {
    top = element.offsetTop + 180;
  } else {
    top = element.offsetTop + 280;
  }
  scrollTo(top, 600);
}

if (pagenavElement) {

  pagenavAElements = pagenavElement.querySelectorAll('a');

  for(var i = 0; i < pagenavAElements.length; i++) {
    pagenavAElements[i].addEventListener('click', scroll);
  }

}
