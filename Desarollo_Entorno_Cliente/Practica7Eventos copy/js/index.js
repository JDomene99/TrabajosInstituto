//saber el tiempo que hay en una localidad
//objeter el json de una localidad
//mostar en una tarjeta toda la informacion
//el estado del tiempo lo inidca con palabras, crear un array que tenga imagenes de sol, lloviendo,nublado.

const menu = document.querySelector("#myLinks");
const showMenu = document.querySelector("#mostrar");
const $buttonLocalidad = document.querySelector("#buttonLocalidad");
const $localidadForm = document.querySelector("#formLocalidad");

showMenu.addEventListener("click", () => {
  window.getComputedStyle(menu).display == "none" ? menu.style.display = "block" : menu.style.display = "none";
});


$buttonLocalidad.addEventListener('click', () => {
  window.getComputedStyle($localidadForm).display == "none" ? $localidadForm.style.display = "block" : $localidadForm.style.display = "none";
});


const $butonSendTextLocalidad = document.querySelector("#enviarLocalidad");
$butonSendTextLocalidad.addEventListener('click', () => {
  const $name = document.querySelector("#nameLocalidad").value;

});

const url = 'https://restcountries.com/v3.1/name/';
const pintar = (json) => {
  console.log(json);
};

const infoPais = async () => {
  const pais = 'peru';
  const endPoint = url + pais;
  try {
    const response = await fetch(endPoint, { cache: 'no-cache' });
    if (response.ok) {
      const jsonResponse = await response.json();
      return pintar(jsonResponse);
    }
  } catch (e) {
    console.log(e.message);
  }

};


console.log(infoPais());