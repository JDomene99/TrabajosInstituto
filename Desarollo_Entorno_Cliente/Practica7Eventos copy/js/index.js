//saber el tiempo que hay en una localidad
//objeter el json de una localidad
//mostar en una tarjeta toda la informacion
//el estado del tiempo lo inidca con palabras, crear un array que tenga imagenes de sol, lloviendo,nublado.

const menu = document.querySelector("#myLinks");
const showMenu = document.querySelector("#mostrar");

showMenu.addEventListener("click", () => {
  window.getComputedStyle(menu).display == "none" ? menu.style.display ="block" : menu.style.display = "none";
});


const $buttonLocalidad = document.querySelector("#buttonLocalidad");
const $localidadForm = document.querySelector("#formLocalidad");

$buttonLocalidad.addEventListener('click', () => {
  window.getComputedStyle($localidadForm).display == "none" ? $localidadForm.style.display ="block" : $localidadForm.style.display = "none";
});

