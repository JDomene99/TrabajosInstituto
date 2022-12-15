/**
 * a) modificar el codigo para que atraves de callback aparezca 1,2,3
 * b) modificar el codigo para que atraves de promesasas aparezca 1,2,3
 * c) modificar el codigo para que atraves de aysnc await aparezca 1,2,3
 */

// console.log('1');
// setTimeout(() => {
//     console.log('2');


// }, 1000);
// console.log('3');

// //a

// console.log('1');
// setTimeout(() => {
//     console.log('2');


// }, 1000);
// console.log('3');

// function llegar() {
//     console.log('estoy llegando');
// }

// function esperar(callback) {
//     setTimeout(() => {
//         console.log('estoy esperarando');
//     });
//     callback();
// }

// function saliendo() {
//     console.log('saliendo');
// }

// llegar()
// esperar(function () {
//     esperar(function () {
//         esperar(function () {
//             esperar(function () {
//                 esperar(saliendo)
//             })
//         })
//     })
// })

// //b


// //c
// llegar()
// function esperar2() {
//     return new Promise((resolve, reject) => {
//         setTimeout(() => {
//             console.log('esperando2');
//             resolve()
//         }, 2000)
//     })
// }

// async function main() {
//     llegar()
//     await esperar2();
// }


//


// fetch()
//     .then((response) => {
//         return response.json
//     }
//     ).then(data)//aqui es donde recorro los datos
//     .catch(error => console.log(e));


//cuando se cargue la pagina cree un div gris y pasados dos segundos quiero que aparezca una img del json placeholder


const $div1 = document.createElement('div');
$div1.innerText = 'hola';
$div1.style.backgroundColor = 'grey';

const $body = document.querySelector('body');
$body.appendChild($div1);



const $img = document.createElement('img');
const $div2 = document.createElement('div');



const showImg = async () => {
    const url = 'https://jsonplaceholder.typicode.com/photos';
    const endPoint = url;
    try {
        const response = await fetch(endPoint, { cache: 'no-cache' });
        if (response.ok) {
            const jsonResponse = await response.json();

            setTimeout(() => {
                $img.setAttribute('src', jsonResponse[1].thumbnailUrl)
                $body.appendChild($img);
                $div2.innerText = 'adios';
                $body.appendChild($div2);
            }, 2000);


        }
    } catch (e) {
        console.log(e.message);
    }

};

showImg();

//crear un form con un boton buscar en el que se le pase el nombre de un pokemon y automaticamente nos muestre en una tarjera la imagen de ese pokkemon y el tipo
let namePokemon = '';
document.addEventListener('submit', (e) => {
    e.preventDefault();
    namePokemon = document.querySelector('#namePokemon').value;
    showPokemon();

})

const showPokemon = async () => {
    console.log(namePokemon);
    const url = 'https://pokeapi.co/api/v2/pokemon/' + namePokemon;
    console.log(url);
    const endPoint = url;
    try {
        const response = await fetch(endPoint, { cache: 'no-cache' });
        const jsonResponse = await response.json();

        const $img3 = document.createElement('img');
        $img3.setAttribute('src', jsonResponse.sprites.front_default)
        $section = document.querySelector('section');
        $section.appendChild($img3);


    } catch (e) {
        console.log(e.message);
    }

};

