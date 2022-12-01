class Coche{
  constructor(modelo,color,kms,combustible,consumo){
    this.modelo = modelo;
    this.color = color;
    this.kms = kms;
    this.combustible = combustible;
    this.consumo = consumo;    
  }

  addK32ms(planta,puerta,nombre) {
    this.propietarios.push({planta,puerta,nombre})
  }

  addKms(kms) {
    this.kms += kms;
  }

  getTotalGastado(consumo) {
    this.consumo = this.consumo*1.70;
  }
}


function createCoche(){
  const edi = new Coche('Seat','rojo','120000','diesel', '10');
  if(localStorage.getItem(edi.modelo) != null){
    localStorage.setItem(edi.modelo, JSON.stringify(edi));
  }
  else{
    window.alert('Ese dni ya existe');
  }
}


