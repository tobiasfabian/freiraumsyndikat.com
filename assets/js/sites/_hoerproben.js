// _hoerproben.js


(function () {


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
          requestAnimationFrame(positionKlaenge);
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
      requestAnimationFrame(positionKlaenge);
      for(var i = 0; i < klaenge.length; i++) {
        klaenge[i].show();
      }
    } else {
      for(var j = 0; j < klaenge.length; j++) {
        klaenge[j].hide();
      }
    }
  }


  if (hoerprobeElements.length > 0) {

    var klaenge = getKlaenge();

    for(var j = 0; j < hoerprobeElements.length; j++) {
      widgets.push(new Widget(j));
    }

    setInterval(animateKlaenge, 2000);

  }


}());
