import Klaenge from '../modules/Klaenge';

if (document.querySelector('.jahr')) {

  const klaenge = new Klaenge();
  klaenge.positionKlaenge();
  document.addEventListener('click', () => {
    klaenge.positionKlaenge
  });

}
