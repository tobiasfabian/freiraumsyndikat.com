import Klaenge from '../modules/Klaenge';

if (document.querySelector('.error')) {

  const klaenge = new Klaenge();
  klaenge.positionKlaenge();
  document.addEventListener('click', () => {
    klaenge.positionKlaenge
  });

}
