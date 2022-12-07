

//crear un formulario que le pase como parametro (input box) introduciremos el nombre de un pais y nos mostraa el nombre, la capital, la bandera y dentro de un iframe el mapa de google map del pais
const $section = document.querySelector('#section');
const $form = document.createElement('form');
const $input = document.createElement('input');
const $submit = document.createElement('input');

$input.setAttribute('id', 'namePais')
$submit.setAttribute('type', 'button')
$submit.setAttribute('value', 'enviar')

$form.appendChild($submit);
$form.appendChild($input);
$section.appendChild($form);

const $img = document.createElement('img');
const $h1 = document.createElement('h1');
$section.appendChild($img);
$section.appendChild($h1);

const pintar = (json) => {
    console.log(json);
    json.forEach(element => {
        $img.setAttribute('src', element.flags.png)
        $h1.innerHTML = element.capital[0];
    });
    
};

const pintar2 = (json) => {
    console.log(json);
    // json.forEach(element => {
    //     $img.setAttribute('src', element.flags.png)
    //     $h1.innerHTML = element.capital[0];
    // });
    
};

let url = 'https://restcountries.com/v3.1/name/';
$submit.addEventListener('click', () => {
    const name = document.querySelector('#namePais').value;
    url = 'https://restcountries.com/v3.1/name/' + name;
    infoPais();
});

const infoPais = async () => {

    const endPoint = url;
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



