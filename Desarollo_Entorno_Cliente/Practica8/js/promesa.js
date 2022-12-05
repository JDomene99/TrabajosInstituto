const calculo = (n1, n2, callback) => {
    return callback(n1, n2);
};

console.log(calculo(5, 2, (a, b) => a + b));



const data = [{
    language: 'js', id: 1
},
{
    language: 'react', id: 2
},
];


function getInfo() {
    //crea una promesa para obtener informacion de mi dato
    return new Promise((resolve, reject) => {
        //resolve es cuando la promesa ha sido satisfecha y el REJECT cuando no ha sido satisfecha
        data.length == 0 ? reject(new Error('Data empty')) : setTimeout(() => resolve(data), 3000);
    })
}

//forma 1
getInfo()
    .then(response => {
        response.forEach(element => {
            console.log(element.language);
        });
    })
    .catch(reject => console.log(reject.message));



//mejorado
async function fetchData() {
    const libros = await getInfo();
    console.log(libros);
}

try {
    fetchData();
} catch (error) {
    console.log(error.message);
}


//crear una promesa que le pasae como parametro un numero. si no es un numero me devolvera un mensaje de errror. si si es un numero me deevolvera un objeto con la clave numero y resultado, numero= numero pasado como parametro
//y resultado el doble. la promesa de vuelta se ejecutara con un retardo de un numero aleatorio entre 1-4

function getNumero(numero) {
    //crea una promesa para obtener informacion de mi dato
    return new Promise((resolve, reject) => {
        //resolve es cuando la promesa ha sido satisfecha y el REJECT cuando no ha sido satisfecha
        isNaN(numero) ? reject(new Error('no es aleatorio')) : setTimeout(() => resolve({ numero: numero, resultado: numero * 2 }), Math.floor(Math.random() * 3) * 1000);
    })
}

async function fetchData2() {
    const numero = await getNumero(0);
    console.log(numero);
}

try {
    fetchData2();
} catch (error) {
    console.log(error.message);
}


const pintar = (json) => {
    console.log(json);
};

const url = 'https://restcountries.com/v3.1/name/';

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

//crear un formulario que le pase como parametro (input box) introduciremos el nombre de un pais y nos mostraa el nombre, la capital, la bandera y dentro de un iframe el mapa de google map del pais
const $section = document.querySelector('#section');
const $form = document.createElement('form');
const $input = document.createElement('input');
const $submit = document.createElement('input');

$submit.setAttribute('type', 'submit')
$submit.setAttribute('value', 'enviar')

$form.appendChild($submit);
$form.appendChild($input);
$section.appendChild($form);


console.log($submit);
