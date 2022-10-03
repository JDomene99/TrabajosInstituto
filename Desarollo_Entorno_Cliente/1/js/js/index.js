
//Ejercicio A
const myArray = [];
function getArrayNumber(n){
  
  for(let i = 0; i <= n; i++){
    myArray.push(i);
  }
  
  return myArray;
}
//Ejercicio B
function getCloneArray(array){

  return myNewArray = [...array];
}

//Ejercicio c
function sumar(){

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