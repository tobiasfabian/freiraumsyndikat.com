import Klaenge from '../modules/Klaenge';

const klaenge = new Klaenge();
var hoerprobeElements = document.querySelectorAll('.js-hoerprobe');
var widgets = [];
var isPlaying = false;


function Widget(i) {
  var element = hoerprobeElements[i]
  var widget = SC.Widget(element);
  function play() {
    widget.play()
  }
  widget.bind(SC.Widget.Events.PLAY, function(){
    element.style.zIndex = '1';
  });
  widget.bind(SC.Widget.Events.PLAY_PROGRESS, function(e){
    if (e.currentPosition > 500) {
      if (isPlaying === false) {
        requestAnimationFrame(() => {
          klaenge.positionKlaenge();
        });
      }
      isPlaying = true;
    }
  });
  widget.bind(SC.Widget.Events.PAUSE, function(){
    isPlaying = false;
    element.style.zIndex = null;
  });
  widget.bind(SC.Widget.Events.FINISH, function(){
    debugger;
    if (i+1 >= widgets.length) {
      widgets[0].play();
    } else {
      widgets[i+1].play();
    }
  });
  this.play = play;
  this.i = i;
}

function animateKlaenge() {
  if (isPlaying) {
    requestAnimationFrame(() => {
      klaenge.positionKlaenge();
    });
    klaenge.getKlaenge().forEach(klang => {
      klang.show();
    });
  } else {
    klaenge.getKlaenge().forEach(klang => {
      klang.hide();
    });
  }
}


if (hoerprobeElements.length > 0) {

  for(var j = 0; j < hoerprobeElements.length; j++) {
    widgets.push(new Widget(j));
  }

  setInterval(animateKlaenge, 2000);

}
