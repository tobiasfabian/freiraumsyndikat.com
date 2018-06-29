import Klang from './Klang';

class Klaenge {
  getKlaenge() {
    var klangElements = document.querySelectorAll('.klang');
    var klaenge = [];
    if (klangElements.length > 0) {
      for (var i = 0; i < klangElements.length; i++) {
        klaenge.push(new Klang(klangElements[i]));
      }
    }
    return klaenge;
  }


  positionKlaenge() {

    var klaenge = this.getKlaenge();

    for (var i = 0; i < klaenge.length; i++) {
      klaenge[i].position();
    }
  }
}

export default Klaenge;
