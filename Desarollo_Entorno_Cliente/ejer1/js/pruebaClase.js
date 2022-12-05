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

const objetosCoches = {
  coche, coche2, coche3, coche4, coche5,
}

// console.log(objetosCoches.forEach((value) => {
//   console.log(value);
// }));


for (let coche in objetosCoches) {
  console.log(coche.modelo);
}