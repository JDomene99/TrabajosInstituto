const estudiantes = [
    {
        nombre: 'Antonio',
        apellidos: 'Gutiérrez',
        edad: 13,
        curso: 'Web student',
        equipo:{
             modelo: "HP Proliant 730", 
             precio: 787,
             },
    },
    {
        nombre: 'Lucía',
        Apellidos : 'Martos',
        edad: 21,
        curso: 'Web devel opment',
        equipo: 
            {
            modelo : "Acer AK340", 
            precio : 875 ,
            },
    }
];
function findEjercicio(){
    const ejer = document.getElementById("ejer");
    
}
/**
 * @description //  1. Crea una función que me devuelva un objeto clonado. Probarlo
//  con el objeto dado.
 * @param {*} obj 
 * @returns 
 */
const f1 = (obj) =>{
    return structuredClone(obj);
}


/**
 * @description //  2. Crear una función NO PURA que modifique la edad. ¿Ha
//  modificado la edad del objeto original?
 * @param {*} obj 
 * @returns 
 */
const f2 = (obj) =>{
    obj.edad = 10;
    return obj;
}


/**
 * @description //  3. Crear una función PURA que modifique el curso pero NO al
//  objeto original.
 * @param {*} obj 
 * @returns modifica el nuevo objeto creado
 */
const f3 = (obj) =>{
    const obj2= structuredClone(obj);
    for(item of obj2){
        item.curso = 'Web devel opment';
    } 
    return obj2;    
}


/**
 * @description //  4. Crear una función que aplique un IVA al precio (21%) y lo
//  almacene en el propio campo de precio.
 * @param {*} obj 
 * @returns aplica el iba al precio
 */
const f4 = (obj) =>{
    const obj3 = structuredClone(obj);
    for(item of obj3){
        item.equipo.precio = item.equipo.precio*1.21;
    }  
    return obj3;    
}


/**
 * @description //  5. Modificar la función anterior para que le pase un objeto y
//  una cantidad de iva, y seguidamente modifique el campo precio
//  con el iva correspondiente.
 * @param {*} obj 
 * @param {*} iva 
 * @returns modifica el iva del producto introducido
 */
const f5 = (obj, iva) =>{
    const obj4 = structuredClone(obj); 
    for(item of obj4){
        item.equipo.precio = item.equipo.precio - ((item.equipo.precio*iva)/100);
    }  
    return obj4;  
}

//  6. Modificar la función anterior para que redondee el precio del
//  IVA con 3 decimales.
const f6 = (obj, iva) =>{
    const obj4 = structuredClone(obj); 
    for(item of obj4){
        item.equipo.precio = (item.equipo.precio - ((item.equipo.precio*iva)/100)).toFixed(3);
        console.log(item.equipo.precio);
    }  
    return obj4;      
}



const arrayNumber = [1,2,10,4,5,6,10,8,9,10,11];
/**
 * @description //  7. Dado un array de números enteros (generar vosotros uno
//  cualquiera). Crear una función imperativa que le pase como
//  primer parámetro el array y como segundo el número que deseobuscar en el array y que me muestre. [No usar funciones
//     propias de los arrays].
 * @param {*} array 
 * @param {*} numero 
 * @returns el numero que se desea buscar
 */
const f7 = (array, numero) =>{
    const arraycloned = structuredClone(array); 
    for(item of arraycloned){
        if(item == numero){
            return item;
        }
    }
}

  
/**
 * @description 8. Con respecto al ejercicio anterior. Crea una función que
//     cuente cuántas veces está repetido dicho número dentro de mi
//     array. [No usar funciones propias de los arrays].
 * @param {*} array 
 * @param {*} numero 
 * @returns  las veces que se repite el numero introducido
 */
const f8 = (array, numero) =>{
    const arraycloned = structuredClone(array); 
    let contador = 0;
    for(item of arraycloned){
        if(item == numero){
            contador++;
        }
    }
    return contador;
}

//    
/**
 * @description  9. Modificar la función anterior, para que tenga sentido en la
//     programación declarativa a través de algún recurso funcional
//     que posean los arrays. NOs
 * @param {*} array 
 * @param {*} numero 
 * @returns numero encontrado
 */
const f9 = (array, numero) =>{
   return array.find(element => element == numero);
}

const newArray = [1,2,3,4,5,6,7,8,9,10];

// map, filter, reduce, (foreach), find all
// newArray.forEach( (numero, indice, miArray) => {
//     console.log(numero);
//     console.log(indice);
//     console.log(miArray);
// });

// newArray.map(numero => numero*2);
// console.log(newArray.map(numero => numero*2));

// console.log(newArray.filter(numero => numero<=5 && numero>=3 ).sort((a,b)=> a-b ));

const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio'];
//reduce

const numeros = [1,2,3,4,5,6,7,8,9,10];

// console.log(numeros.reduce( (anterior , actual, indice ,array) =>{
//     console.log(anterior);
// console.log(actual);
//     console.log(indice);  
//     console.log(array);

// }  ));


//sumar los numeros
const sumaTodosNumeros = numeros.reduce( (anterior, actual) => { return anterior+actual},0);
console.log(sumaTodosNumeros);


const frutas = ['manzana', 'platano', 'pera', 'manzana', 'fresa', 'pera'];
const newFrutas = [];
const cuenta = frutas.reduce((conteo,fruta) => { 
    conteo[fruta]  = (conteo[fruta] || 0) +  1;    
    return conteo;

},{});
console.log(cuenta);

const newNumer = [1,2,[3,4],5,1,[1,3,4,4]];

const aplanar = newNumer.reduce( (a,b) =>{ 
    return  a = a.concat(b);
},[]);

console.log(aplanar);

const users = [
    {
      "id": 1,
      "name": "Leanne Graham",
      "username": "Bret",
      "edad" : 3,
      "email": "Sincere@april.biz",
      "address": {
        "street": "Kulas Light",
        "suite": "Apt. 556",
        "city": "Gwenborough",
        "zipcode": "92998-3874",
        "geo": {
          "lat": "-37.3159",
          "lng": "81.1496"
        }
      },
      "phone": "1-770-736-8031 x56442",
      "website": "hildegard.org",
      "company": {
        "name": "Romaguera-Crona",
        "catchPhrase": "Multi-layered client-server neural-net",
        "bs": "harness real-time e-markets"
      }
    },
    {
      "id": 2,
      "name": "Ervin Howell",
      "username": "Antonette",
      "email": "Shanna@melissa.tv",
      "edad" : 13,
      "address": {
        "street": "Victor Plains",
        "suite": "Suite 879",
        "city": "Wisokyburgh",
        "zipcode": "90566-7771",
        "geo": {
          "lat": "-43.9509",
          "lng": "-34.4618"
        }
      },
      "phone": "010-692-6593 x09125",
      "website": "anastasia.net",
      "company": {
        "name": "Deckow-Crist",
        "catchPhrase": "Proactive didactic contingency",
        "bs": "synergize scalable supply-chains"
      }
    },
    {
      "id": 3,
      "name": "Clementine Bauch",
      "username": "Samantha",
      "edad" : 10,
      "email": "Nathan@yesenia.net",
      "address": {
        "street": "Douglas Extension",
        "suite": "Suite 847",
        "city": "McKenziehaven",
        "zipcode": "59590-4157",
        "geo": {
          "lat": "-68.6102",
          "lng": "-47.0653"
        }
      },
      "phone": "1-463-123-4447",
      "website": "ramiro.info",
      "company": {
        "name": "Romaguera-Jacobson",
        "catchPhrase": "Face to face bifurcated interface",
        "bs": "e-enable strategic applications"
      }
    },
    {
      "id": 4,
      "name": "Patricia Lebsack",
      "username": "Karianne",
      "edad" : 33,
      "email": "Julianne.OConner@kory.org",
      "address": {
        "street": "Hoeger Mall",
        "suite": "Apt. 692",
        "city": "South Elvis",
        "zipcode": "53919-4257",
        "geo": {
          "lat": "29.4572",
          "lng": "-164.2990"
        }
      },
      "phone": "493-170-9623 x156",
      "website": "kale.biz",
      "company": {
        "name": "Robel-Corkery",
        "catchPhrase": "Multi-tiered zero tolerance productivity",
        "bs": "transition cutting-edge web services"
      }
    },
    {
      "id": 5,
      "name": "Chelsey Dietrich",
      "edad" : 20,
      "username": "Kamren",
      "email": "Lucio_Hettinger@annie.ca",
      "address": {
        "street": "Skiles Walks",
        "suite": "Suite 351",
        "city": "Roscoeview",
        "zipcode": "33263",
        "geo": {
          "lat": "-31.8129",
          "lng": "62.5342"
        }
      },
      "phone": "(254)954-1289",
      "website": "demarco.info",
      "company": {
        "name": "Keebler LLC",
        "catchPhrase": "User-centric fault-tolerant solution",
        "bs": "revolutionize end-to-end systems"
      }
    },
    {
      "id": 6,
      "name": "Mrs. Dennis Schulist",
      "username": "Leopoldo_Corkery",
      "edad" : 32,
      "email": "Karley_Dach@jasper.info",
      "address": {
        "street": "Norberto Crossing",
        "suite": "Apt. 950",
        "city": "South Christy",
        "zipcode": "23505-1337",
        "geo": {
          "lat": "-71.4197",
          "lng": "71.7478"
        }
      },
      "phone": "1-477-935-8478 x6430",
      "website": "ola.org",
      "company": {
        "name": "Considine-Lockman",
        "catchPhrase": "Synchronised bottom-line interface",
        "bs": "e-enable innovative applications"
      }
    },
    {
      "id": 7,
      "name": "Kurtis Weissnat",
      "username": "Elwyn.Skiles",
      "edad" : 93,
      "email": "Telly.Hoeger@billy.biz",
      "address": {
        "street": "Rex Trail",
        "suite": "Suite 280",
        "city": "Howemouth",
        "zipcode": "58804-1099",
        "geo": {
          "lat": "24.8918",
          "lng": "21.8984"
        }
      },
      "phone": "210.067.6132",
      "website": "elvis.io",
      "company": {
        "name": "Johns Group",
        "catchPhrase": "Configurable multimedia task-force",
        "bs": "generate enterprise e-tailers"
      }
    },
    {
      "id": 8,
      "name": "Nicholas Runolfsdottir V",
      "edad" : 23,
      "username": "Maxime_Nienow",
      "email": "Sherwood@rosamond.me",
      "address": {
        "street": "Ellsworth Summit",
        "suite": "Suite 729",
        "city": "Aliyaview",
        "zipcode": "45169",
        "geo": {
          "lat": "-14.3990",
          "lng": "-120.7677"
        }
      },
      "phone": "586.493.6943 x140",
      "website": "jacynthe.com",
      "company": {
        "name": "Abernathy Group",
        "catchPhrase": "Implemented secondary concept",
        "bs": "e-enable extensible e-tailers"
      }
    },
    {
      "id": 9,
      "name": "Glenna Reichert",
      "edad" : 43,
      "username": "Delphine",
      "email": "Chaim_McDermott@dana.io",
      "address": {
        "street": "Dayna Park",
        "suite": "Suite 449",
        "city": "Bartholomebury",
        "zipcode": "76495-3109",
        "geo": {
          "lat": "24.6463",
          "lng": "-168.8889"
        }
      },
      "phone": "(775)976-6794 x41206",
      "website": "conrad.com",
      "company": {
        "name": "Yost and Sons",
        "catchPhrase": "Switchable contextually-based project",
        "bs": "aggregate real-time technologies"
      }
    },
    {
      "id": 10,
      "name": "Clementina DuBuque",
      "edad" : 33,
      "username": "Moriah.Stanton",
      "email": "Rey.Padberg@karina.biz",
      "address": {
        "street": "Kattie Turnpike",
        "suite": "Suite 198",
        "city": "Lebsackbury",
        "zipcode": "31428-2261",
        "geo": {
          "lat": "-38.2386",
          "lng": "57.2232"
        }
      },
      "phone": "024-648-3804",
      "website": "ambrose.net",
      "company": {
        "name": "Hoeger LLC",
        "catchPhrase": "Centralized empowering task-force",
        "bs": "target end-to-end models"
      }
    }
];
//1.-mostar los id y username en mayuscula cuya edad sea inferior a 35
const ejer1 = users.map( users =>  users.edad < 35 ? users.id : ) ;
// 2.- mostar en un array {nombre,city} de los usuarios cuya edad sea > que la edad promedio
const ejer2 = users.reduce((a,b) =>{
    if(b.edad>30){
        a = b.edad ;
    }
},[]);