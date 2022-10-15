const estudiantes = [
    {
        nombre: 'Antonio',
        Apellidos: 'Gutiérrez',
        Edad: 13,
        curso: 'Web student',
        equipo:{
             modelo: "HP Proliant 730", 
             precio: 787,
             },
    },
    {
        nombre: 'Lucía',
        Apellidos : 'Martos',
        Edad: 21,
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
    const obj2= {...obj}
    obj2.edad = 10;
    return obj2;
}


/**
 * @description //  3. Crear una función PURA que modifique el curso pero NO al
//  objeto original.
 * @param {*} obj 
 * @returns modifica el nuevo objeto creado
 */
const f3 = (obj) =>{
    const obj2= structuredClone(obj);
    obj2.curso = 'Web devel opment';
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
    let result = obj3.equipo.precio;
    obj3.equipo.precio = result*1.21;  
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
    const obj3 = structuredClone(obj); 
    let result = obj3.equipo.precio;
    obj3.equipo.precio = result - ((result*iva)/100);  
    return obj3;    
}

//  6. Modificar la función anterior para que redondee el precio del
//  IVA con 3 decimales.
const f6 = (obj, iva) =>{
    const obj3 = structuredClone(obj); 
    let result = obj3.equipo.precio;
    obj3.equipo.precio = result - ((result*iva)/100).toFixed(3);  
    return obj3;    
}



const arrayNumber = [1,2,3,4,5,6,7,8,9,10,11];
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
    for(item in arraycloned){
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
    for(item in arraycloned){
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

//     10.Utilizando el mismo array anterior crear una función en forma
//     imperativa que le pase como parámetro el array y un número y
//     seguidamente multiplique todos los elementos del array por
//     el número indicado. Si el número es 0 o nada.. entonces no
//     multiplicará por nada.
//     11.Modificar la función anterior para convertirla en forma de
//     programación declarativa .
//     12.Crear una función que calcule el máximo de los números de un
//     array pasados como parámetro.
//     13.Crear una función que al pasarle un array, obtenga SÓLO los
//     números pares pero multiplicados por 10.
//     14.Crear una función que le pasemos como primer parámetro un
//     objeto (en nuestro caso el objeto estudiantes) y como segundo
//     parámetro una cantidad en euros. Seguidamente me mostrará
//     aquellos estudiantes que posean un portátil con un precio
//     superior a la cantidad indicada.
//     15.Crear una función que le pasemos como parámetro un Array de
//     números (con números repetidos o no) y que seguidamente me
//     devuelva el array sin ningún número repetido.
//     16. Dado un objeto estudiantes. Se pide crear una función que
//     al pasarle el objeto me devuelva sólo los alumnos menores de
//     edad o que sean web development.
//     17.Crear una función que al pasarle el objeto estudiantes ordene
//     los datos por el precio del equipo que posee el alumno, de
//     menor a mayor.
//     18.Crear una función que al pasarle el objeto estudiantes ponga
//     el nombre en mayúsculas.
//     19.Usando las funciones que creadas hasta ahora… Aplica al array
//     de estudiantes las mayúsculas de los nombres, el iva al precio
//     y la ordenación por precio .. todo a la vez.