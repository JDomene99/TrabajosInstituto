//saber el tiempo que hay en una localidad
//objeter el json de una localidad
//mostar en una tarjeta toda la informacion
//el estado del tiempo lo inidca con palabras, crear un array que tenga imagenes de sol, lloviendo,nublado.

const menu = document.querySelector("#myLinks");
const closeMenu = document.querySelector("#ocultar");
const showMenu = document.querySelector("#mostrar");


// function toggleMenu() {
//   if(menu.style.display = "block") {
//     menu.style.display = "none";
//     close.style.display = "none";
//     show.style.display = "block";
//   }else{
//     // menu.style.display = "none";
//     close.style.display = "block";
//     show.style.display = "none";
//   }
// }

function mostrarMenu(){
  console.log('muestra');
  menu.style.display = "visible";
  closeMenu.style.display = "visible";
  // showMenu.style.display = "none";

}

function ocultarMenu(){
  console.log('no muestra');
  menu.style.display = "hidden";
  closeMenu.style.display = "hidden";
  showMenu.style.display = "visible";

}

showMenu.addEventListener("click", mostrarMenu);
closeMenu.addEventListener("click", ocultarMenu);