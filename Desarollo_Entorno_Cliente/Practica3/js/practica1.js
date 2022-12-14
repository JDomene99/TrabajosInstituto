/**
 * @param
 * 
 * 
 */
let productos = [
    {
        nombre : 'prod1',
        precio : 2 ,
        disponible : true,
    },
    {
        nombre : 'prod2',
        precio : 5 ,
        disponible : true,
    },
    {
        nombre : 'prod3',
        precio : 30 ,
        disponible : false,
    },
    {
        nombre : 'prod4',
        precio : 40 ,
        disponible : true,
    },
    {
        nombre : 'prod5',
        precio : 10 ,
        disponible : true,
    },
    {
        nombre : 'prod6',
        precio : 1000 ,
        disponible : false,
    },
];

//Dado un array de objetos productos se pide.
// a.- Crear un array que contenga el gasto realizado para realaizar cada producto.
function getPrice(arrayObjetos){
    arrayPrecios = [];
    for(let producto  of productos){
        arrayPrecios.push(producto.precio);
    }
    return arrayPrecios;
    
}
console.log(getPrice(productos));

// b.- Crear una funcion que calcule el total gastado, utilizando el apartado anterior y sin en apartado enterior.
function getTotalPrice(arrayObjetos){
    let sumaProd = 0;
    for(let producto  of productos){
        sumaProd = sumaProd + producto.precio;
    }
    return sumaProd;
}
console.log(getTotalPrice(productos));

// c.- Crear una funcion que calcule el promedio del precio del componente que aquellos que sin estan en stock.
function getMediumPrice(arrayObjetos){
    let sumaProd = 0;
    for(let producto  of productos){
        if(producto.disponible == true ){
            sumaProd = sumaProd + producto.precio;    
        }
    }
    return sumaProd;
}
console.log(getMediumPrice(productos));


const numeros =  [1,2,3,4,5,6,7,8,9,10,11,12];

numeros.map((numero) => numero > 3 ? (numeros[numero]) : '');
console.log(numeros);




/**
 * creacion de una funcion pura
 * a) igual parametro genera mismo resultado.
 */

const getTomorrow = () => {
    const mañana = new Date();
    mañana.setDate(mañana.getDate()+1);
    return mañana;
}


const getTomorrow2 = (date) => {
    const mañana = new Date(date);
    mañana.setDate(mañana.getDate()+1);
    return mañana;
}

const fecha = new Date("2022-10-13 00:00:01");
console.log(getTomorrow2(fecha));


/**
 * crear un objeto estudiante
 */
const estudiante = {
    nombre : 'paco',
    edad : 32,
    equipo : {nombre : 'AMD', precio : 193,},
};

/**
 *crear una funcion que le sume uno a la edad del estudiante 
 */

const sumaEdad = (obj) => {
    const copiaAlumno = structuredClone(obj); //clona el objeto a todos los niveles.
    let precio = copiaAlumno.equipo.precio;
    console.log(copiaAlumno.equipo);
    precio = precio*1.21;    
    return precio;
}
console.log(sumaEdad(estudiante));
//el spread operator solo funciona en el primer nivel de los objetos;

