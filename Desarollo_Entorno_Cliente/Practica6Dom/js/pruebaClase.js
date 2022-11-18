/**
 * DOCUMENT OBJECT MODEL DOM api para mover-interactuar con los elementos del window document
    La intereaccion es con html y XML 
 */

//Elementos del documento
// console.log(document);
// console.log(document.head);
// console.log(document.documentElement);
// console.log(document.scripts);

//NODOS, ELEMENT Y SELECTORES

//coger elementos del li 
// console.log(document.getElementsByTagName('li'));
// console.log(document.getElementsByClassName('estaciones'));
// console.log(document.getElementsByName('nombre'));

//nueva manera de coger elementos
// console.log(document.getElementById('idUl'));
// console.log(document.querySelector('.estaciones')); //solo la primera ocurrencia
// console.log(document.querySelectorAll('.estaciones').length); //todos
// console.log(document.querySelectorAll('a'));
// console.log(document.querySelectorAll('#idUl li'));

//data.attributes
// console.log(document.querySelector('[data-link]').href);
// console.log(document.querySelector('[data-link]').getAttribute('href'));
// document.documentElement.lang = 'en';
// document.documentElement.setAttribute('lang', 'it');

// const $linkGoogle = document.querySelector('.linkGoogle');
// console.log($linkGoogle);
// $linkGoogle.setAttribute('target','_blank');

// $linkGoogle.setAttribute('href','https://www.marca.com');

// $linkGoogle.setAttribute('class','hola');

// $linkGoogle.removeAttribute('body');



// //elementos para acceder al texto

// const $testoDomId = document.getElementById('idTexto');
const $testoDom = document.querySelector('.textoModificado');

// let textoInsertar = `
//     <p>
//         Ejemplo de parrafo
//     </p>    

//     <p>
//         Lorem10
//     </p>

// `;
// $testoDomId.textContent = textoInsertar;
// $testoDomId.innerHTML = textoInsertar;
// $testoDomId.outerHTML = textoInsertar;

// console.log($testoDom.children);

// console.log($testoDom.parentElement);

// console.log($testoDom.firstElementChild);

// console.log($testoDom.nextSibling);


//crear elementos

/**
 * Crear un boton que al pulsarlo genere un numero aleatorio entre uno y 100 y automaticamente me creara un li
 * que contenga una imagen y una descripcion por cada x veces del numero aleatorio [animals,nature,people,tech]
 * 
 * 
 */


const category= ['animals','nature','people','tech'];
function generateImage(){
    const array = new Array(Math.floor(Math.random() * 10000));
    const $body = document.querySelector('body');

    for(let i=0; i<array.length; i++) {
        const array2 = Math.floor(Math.random() * 4);
        const $img = document.createElement("img");
        $img.setAttribute('src', 'https://placeimg.com/300/300/'+category[array2]);
        $body.appendChild($img);
        console.log(i);
    }
}



