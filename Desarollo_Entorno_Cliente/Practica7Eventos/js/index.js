//modos de lanzar eventos

function saludar() {
  console.log('hola');
}
//evento semantico

const $evento = document.querySelector('#boton-pulsar');

//si es function si nombre no se le puede pasar paramentros
$evento.onclick = function () {
  console.log('hola');
}

//manejadores multiples
const $evento2 = document.querySelector('#boton-pulsar2');
$evento2.addEventListener('click', saludar);
$evento2.addEventListener('click', (e) => {
  console.log('crack');
  console.log(this);
  console.log(e);
  console.log(e.target);
  console.log(e.type);
});

//solo se pueden borrar los eventos que utilizan las funciones nombradas
const $delete = document.querySelector('#deleteEvent');
const deleteDobleCkick = () => {
  console.log('eliminando el event de doble click');
  $delete.removeEventListener('dblclick', deleteDobleCkick);

}

$delete.addEventListener('dblclick', deleteDobleCkick);


/**
 *fases por las que pasa la llamada y ejecucuin de un evento
 Cuando un evento se origina se produce la propagacion desde el elemento mas interno al mas externo
 1.- fase de captura: la captura del evento va desde el elemento mas arriba de html hasta llegar o localizar el elemento del doom mas profundo que ha producido el evento
 2.- fase target: se mira si el elemento mas profundo tiene en su listener de eventos una funcion asociada al evento
 3.- fase bubbling : (no todos los eventos) si dispongo de un listener del ecvento entonces se ejecuta y luego sube en el doom preguntado a cada elemento padre si tiene un listener asociado a ese evento
 */

const $flujoEventosDivs = document.querySelectorAll('.flujo-eventos div');

function funcionFlujoEventos(evt) {
  console.log(`Hola soy ${this.className} el click lo ha lanzado ${evt.target.className}`);
}

$flujoEventosDivs.forEach((div) => {
  div.addEventListener('click', funcionFlujoEventos, { capture: false, once: true });
});

