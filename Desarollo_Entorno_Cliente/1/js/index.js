

/**
 * @description  Crear función que le pase un número n(obligatorio) y que devuelva un array con
                  ‘n números aleatorios entre 1 y n’.
 * @param {numero}n
 * @author jose Domene Quesada
 * @return {[numero]} nos devuelve un array con tamañano n relleno de numeros random
 */
const myArray = [];
function getArrayNumber(n){
  
  for(let i = 0; i <n; i++){
    myArray.push(Math.floor(Math.random() * (n - 1 + 1)) + 1);
  }
  return myArray;
}


/**
 * @description  Crear una función que le pase como parámetro un array y devuelva una copia de dicho array
 * @param {[]}array
 * @author jose Domene Quesada
 * @return {[]} nos devuelve una copia del array 
 */
let myArray2 = [];
function getCloneArray(array){

  return myArray2 = [...array];
}


/**
 * @description  Crea una función (Sumar) que sume números pasados como parámetros. Usa el
operador spread para pasar como argumento a mi función un array dado de
números
 * @param {numero}arraynumeros
 * @author jose Domene Quesada
 * @return {number} nos devuelve la suma de todos los numeros que forman el array
 */
let sumaNumero = 0;
function sumar(arrayNumeros){
  for(let i = 0; i < arrayNumeros.length; i++){
    sumaNumero += arrayNumeros[i]
  }
  return sumaNumero;
}


/**
 * @description  Crear un programa que a través de un input pida nombres de ciudades hasta
que escribamos fin o Fin. Dichos nombres se guardarán en un array que para
finalizar se mostrará ordenado de z-a en una etiqueta DIV.

 * @param 
 * @author jose Domene Quesada
 * @return {}nos devuelve el array ciudades ordenados de la z a la a 
 */
const arrayCiudades = [];
function getCiudades(){

  let ciudad = document.getElementById("ciudad").value;
  if(ciudad === "fin" || ciudad === "FIN"){
    arrayCiudades.sort();
    
    document.getElementById("infociudades").innerHTML ="Las ciudades escritas son : "+ arrayCiudades.reverse();;
  }
  else{
    arrayCiudades.push(ciudad);
  }
  console.log(arrayCiudades);
}


/**
 * @description  Utilizar el operador spread o de propagación para obtener el máximo y mínimo
de un array dado. Utiliza también dicho operador de propagación para crear
una copia de un array dado
 * @param {numero}arrayNumeros
 * @author jose Domene Quesada
 * @return {[number, number, [number]} nos devuelve el maximo y el minimo de un array y su copia
 */
function mayorYmenor(arrayNumeros){
  arrayNumeros.sort();
  return "El mayor es "+Math.max(...arrayNumeros)+ " y el menor "+Math.min(...arrayNumeros) + ". La copia del array es "+ getCloneArray(arrayNumeros);
}