// _startseite.js


(function () {


  var element = document.querySelector('.startseite');

  function showVideo () {
    startseiteVideoElement.classList.add('show');
    videoElement.play();
  }

  function hideVideo () {
    startseiteVideoElement.classList.remove('show');
    videoElement.pause();
  }

  if (element) {

    var startseiteButtonElement = element.querySelector('.startseite--button');
    var startseiteVideoElement = element.querySelector('.startseite--video');
    var startseiteVideoCloseElement = startseiteVideoElement.querySelector('.startseite--video--close');
    var videoElement = startseiteVideoElement.querySelector('video');

    if (videoElement) {

      if (window.innerWidth > 544) {
        videoElement.play();
      }
      videoElement.addEventListener('click', function () {
        if (videoElement.paused) {
          videoElement.play();
          element.classList.remove('paused');
        } else {
          videoElement.pause();
          element.classList.add('paused');
        }
      });

    }

    if (startseiteButtonElement) {

      var buttonElement = startseiteButtonElement.querySelector('button');

      buttonElement.addEventListener('click', showVideo);
      startseiteVideoCloseElement.addEventListener('click', hideVideo);

      startseiteButtonElement.addEventListener('click', positionKlaenge);

      positionKlaenge();

    }

  }


}());
