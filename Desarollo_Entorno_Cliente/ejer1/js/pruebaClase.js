class Coche {
  constructor(modelo, color, kms, combustible, consumo) {
    this.modelo = modelo;
    this.color = color;
    this.kms = kms;
    this.combustible = combustible;
    this.consumo = consumo;
  }

  addK32ms(planta, puerta, nombre) {
    this.propietarios.push({ planta, puerta, nombre })
  }

  addKms(kms) {
    this.kms += kms;
  }

  getTotalGastado(consumo) {
    this.consumo = this.consumo * 1.70;
  }
}


function createCoche() {
  const coche = new Coche('Seat', 'rojo', '120000', 'diesel', '10');
  if (localStorage.getItem(coche.modelo) != null) {
    localStorage.setItem(coche.modelo, JSON.stringify(coche));
  }
  else {
    window.alert('Ese coche ya existe');
  }
}

const coche = new Coche('Seat', 'rojo', '120000', 'diesel', '10');
const coche2 = new Coche('Golft', 'verde', '120000', 'diesel', '10');
const coche3 = new Coche('Toyota', 'azul', '120000', 'diesel', '10');
const coche4 = new Coche('Dacia', 'amarillo', '120000', 'diesel', '10');
const coche5 = new Coche('Renautl', 'negro', '120000', 'diesel', '10');

const objetosCoches = [
coche, coche2, coche3, coche4, coche5,
];

function showCars(){
  const $section = document.querySelector('section');
  const $template = document.querySelector('template').content;
  const $fragement = document.createDocumentFragment();
  
  const img = ['https://www.rastreator.com/wp-content/uploads/AudiA1-rastreator-com-300x300.jpg', 'https://www.rastreator.com/wp-content/uploads/2017/06/50-300x300.jpg', 'https://www.rastreator.com/wp-content/uploads/mejores-coches-para-conductores-noveles-1-300x300.png', 'https://neumaticosparacoches.com/wp-content/uploads/2022/09/modelo-de-coche-por-matricula-gratis-300x300.jpg', 'https://www.autosreina.es/wp-content/uploads/2022/12/Coches-Compra-Venta-Autos-Reina-VW-POLO-1.4-TDI-BMT-Advance-75CV-Frontal-300x300.jpg'];
  let i = 0;
  for (let coches of objetosCoches) {
    
    $template.querySelector('.img').setAttribute('src', img[i]); 
    console.log( coches.modelo); 
    $template.querySelector('.text').textContent = coches.modelo;
    //clonamos e importamos el template
    let clonado = document.importNode($template, true);
    
    $fragement.appendChild(clonado);
    i++;
  }
  $section.appendChild($fragement);
 
}


const $button = document.querySelector('.boton')
$button.addEventListener( 'click', showCars);


// let counter = 0;
// const i = setInterval(function(){
//     counter++;
    
//     if(counter === 5) {
//         clearInterval(i);
//     }
// }, 1000);