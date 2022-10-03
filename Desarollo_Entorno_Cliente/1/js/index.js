
//Ejercicio A
const myArray = [];
function getArrayNumber(n){
  
  for(let i = 0; i <n; i++){
    myArray.push(Math.floor(Math.random() * (n - 1 + 1)) + 1);
  }
  return myArray;
}
//Ejercicio B
let myArray2 = [];
function getCloneArray(array){

  return myArray2 = [...array];
}

//Ejercicio c
let sumaNumero = 0;
function sumar(arrayNumeros){
  for(let i = 0; i < arrayNumeros.length; i++){
    sumaNumero += arrayNumeros[i]
  }
  return sumaNumero;
}

//Ejercicio d
const arrayCiudades = [];
function getCiudades(){

  let ciudad = document.getElementById("ciudad").value;
  if(ciudad === "fin" || ciudad === "FIN"){
    arrayCiudades.sort();
    document.getElementById("infociudades").innerHTML ="Las ciudades escritas son : "+ arrayCiudades.sort();
  }
  else{
    arrayCiudades.push(ciudad);
  }
  console.log(arrayCiudades);
}

//Ejercicio E

function mayorYmenor(arrayNumeros){
  
  return "El mayor es "+Math.max(...arrayNumeros)+ " y el menor "+Math.min(...arrayNumeros) + ". La copia del array es "+ getCloneArray(arrayNumeros);
}