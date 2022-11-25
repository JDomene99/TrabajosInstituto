//saber el tiempo que hay en una localidad
//objeter el json de una localidad
//mostar en una tarjeta toda la informacion
//el estado del tiempo lo inidca con palabras, crear un array que tenga imagenes de sol, lloviendo,nublado.

const $mostrar = document.querySelector('mostrar');
$mostrar.addEventListener('click', deshabilitar() )


const $myLinks = document.querySelector('myLinks');
function deshabilitar(){
  $myLinks.style.display = "none";
}
