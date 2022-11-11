import sumar from "./importExport.js";
console.log(sumar(5,1));

const Usuario = function(name, password){
  this.name = name;
  this.password = password;
  this.checkPassword = function(){
      return this.password.length >= 8;
  }
}

const user = new Usuario("Antonio", "ratatui");

console.log(user);
console.log(user.checkPassword());


function crearDato(name,pais){
  this.name = name;
  this.pais = pais;
  this.checkName = function(){
    return this.name.length >= 4;
  }

}

class Dato {
  constructor(name, pais) {
    this.name = name;
    this.pais = pais;

    this.checkName = function () {
      return this.name.length >= 4;
    };

  }
}
const dato1 = new crearDato('dato1', 'ESP');
const dato2 = new Dato('dato2', 'ENG');

console.log(dato2);
console.log(dato2.checkName());

/**
 * Disponenemos de un objeto edificio, cada obj tiene name, calle, cp, localidad,(puerta,planta) y por cada edificio tenemos una estructura
 *  que almacene por cada puerta el nombre del propietario. Crear una clase que simplifique el edificio
 * 
 */



class Edificio{
  constructor(name,calle,localidad,cp){
    this.name = name;
    this.calle = calle;
    this.localidad = localidad;
    this.cp = cp;
    this.propietarios = [];

    
  }

  addPropietario(planta,puerta,nombre) {
    this.propietarios.push({planta,puerta,nombre})
  }

  getPropietarios() {
    this.propietarios.forEach(element => {
      console.log(element.nombre);
    })
  }

}
const edi = new Edificio('edi1','Avenida pulianas','granada','18011');

edi.addPropietario(1,'A','Jose');
edi.addPropietario(1,'B','Dani');
console.log(edi.getPropietarios()); 
console.log(edi);



//necesitamos implementar una agenda utilizando un formulario que recoja nombre,direccion,telefono y cursos de formacion
// a los que esta subscrito 
// crear una clase que permita añadir elementos, utilizando html
//los campos no pueden estar vacios y el telefono tiene que tener 9 dig
// y el dni

class Persona{
  constructor(name,fechaNacimiento,teledono,dni){
    this._name = name;
    this._fechaNacimiento = fechaNacimiento;
    this._teledono = teledono;
    this._dni = dni;
  }

  //metodos
  set setNombre(newNombre){
    this._name = newNombre;
  }

  get getNombre(){
    return this._name;
  }

  static informacion(){
    return "texto de prueba";
  }

}

const persona = new Persona('jose', '1999', '622010997', '45921549w');
persona.setNombre = 'pedro';
console.log(persona);
Persona.informacion();

/**
 *  clase nombre,dni,fechaNacimiento,cp
 * a) crear un fichero adicional que sea comporbaciones.js que me calcule la edad que tengo(calculoEdad) verifique que el dni es correcto
 * funcion obtener letra dni y comprar el codigo postal para que sea un numero de 5 digitos
 * crear un formulario utilizando la libreria bootstrap  con los siguientes campos
 * cada vez que insertemos un usuario
 * cada vez que le de a insertar me creara un div donde se ira añadiendo un usuario
 * esta informacion debe guardarse en el localstorage siendo imposible añadir un usuario con el mismo dni
 * para ello cuando iniciamos la pagina web debemos hacer una lectrua del localstorage y cargar los elementos que hay
 * 
 */

