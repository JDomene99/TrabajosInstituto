/**
 * Map
 * Clave puede ser de cualquier tipo
 * 
 */
// const usuario = {
//   nombre : 'carlos',
//   ocupacion : 'profesor',
// };
// //crear un map simple
// // const carlos = new Map(['nombre','carlos'], ['ocupacion','profesor']);

// //como crear un map utilizando u obj
// const misUsuarios = new Map(Object.entries(usuario));

// //convertir un map a obj
// // const myArray = new Map(Object.from(usuario));


// const mapVacio = new Map();
// console.log(mapVacio.size);

// //averigguar si una clave esta en el map
// mapVacio.has('lo que quiera buscar');

// //sacar el valor de una clave,borrar,borrar todo,añadir elemento al map
// mapVacio.get('')
// mapVacio.delete('');
// mapVacio.clear();
// mapVacio.set('clave', 'valor');


// // Utilizando Map crear una estrutura de datos que recoja los clientes de un centro deportivo para su ficha de registro.Debemos conoceer
// // nombre,apellidos,telefono,edad,sexo,peso,altura
// //1.- crear una funcion que permita crear un usuario untilizando map
// const datosUsuario = new Map();

// function addUser(nombre,apellidos,edad,telefono,sexo,peso,altura) {
  
//   datosUsuario.set('nombre', nombre);
//   datosUsuario.set('apellidos', apellidos);
//   datosUsuario.set('edad', edad);
//   datosUsuario.set('telefono', telefono);
//   datosUsuario.set('sexo', sexo);
//   datosUsuario.set('peso', peso);
//   datosUsuario.set('altura', altura);
// }

// addUser('pedro','jimenez','13','16511','m','90','190');
// console.log(datosUsuario);


// // const datosUsuario2 = new Map();
// // datosUsuario2.set('');


// //alamcene el inidce pluviometrico de los meses del año
// const meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre'];
// const indice = new Set();
// for(item of meses){
//   indice.add([item,  Math.floor(Math.random() * (101 - 1) + 1)]);
// }


// const alumno  = new Map( [ ['nombre', 'carlos'],['edad',45],['sexo','v'] ] );

// alumno.forEach( (element, key) => {   
//   console.log(element);
    
// });

// for(item of alumno.values()){
//   console.log(item);
   
// }


// const indicePlu = new Map( [['enero',100], ['febrero',100], ['marzo',80]] );
// const setMeses = new Set();
// let suma = 0;
// for(let item of indicePlu.values()){
//   setMeses.add(item)
//   if(setMeses.add(item)){
//     suma +=item;  
//     console.log(suma);
//   }
  
// }
// console.log(setMeses);
// console.log(suma/setMeses.size);

// map a obje
// const obj = Object.fromEntries(map);

// //map a array
// const array = Array.from(map);


const array2 = [1,1,1,2,3,4];
const newArray2 = [... new Set(array2)];
console.log(newArray2);


const alumnos = [ { nombre : 'pedro', edad: 34,}, 
{ nombre: 'javi' , edad: 34},
{nombre : 'luis', edad: 30}, 
];

const alumnosNoRep = new Set();
for(let alumno of alumnos){
  alumnosNoRep.add(alumno.edad);
  
}
const miArray = [... alumnosNoRep];
console.log(miArray);

//otra forma

const set =  new Set();
alumnos.forEach( 
  alumno => set.add(alumno.edad)
);
console.log(set);

const set2 = [...new Set(alumnos.map(alumno => alumno.edad ))];

const aerolineas = [
  { nombre: 'Iberia',
    AeropuertoBase: 'Barajas',
    Pais: 'ES',
    SalidasA : {Granada: 17, Barcelona: 19, Paris: 21 },
    LlegadasD : {Paris: 23, Barcelona: 17, Londres: 14 },
  }, 

];
 
const mapAerolineas = new Map();

// for(item of aerolineas){
//   console.log(mapAerolineas.set(item.nombre, item.Pais));

// }
// console.log(mapAerolineas);

// const obj = {};
// for(item of aerolineas){

//   const horas = {...item.SalidasA};
//   for(item2 in horas){
//     obj[item2]=(horas[item2]);
//     mapAerolineas.set(item.nombre,obj);
//   }
// }
// console.log(mapAerolineas);



function getPrueba(nombreAerBase,destino){
  
  for(item of aerolineas){

      if(item.AeropuertoBase == nombreAerBase){
          console.log(item.SalidasA[destino]);
          console.log(item.LlegadasD[destino]);

      }
      
  }   
}
