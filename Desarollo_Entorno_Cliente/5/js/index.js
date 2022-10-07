/**
 * 
 * @param {*} a 
 * @param {*} b 
 * @returns compara los dos numeros dados
 */
function ordenar(a,b){
  return a-b;
}

/**
 * @description cRealizar un programa que nos pida números usando un input hasta que escribamos fin
o FIN (se deshabilitará el botón de insertar más elementos).
En caso de introducir texto mostrará mensaje de error con alert. Una vez concluida la
petición de números realizará los siguientes cálculos que introducirá dentro del
documento html en una lista ordenada:
Cálculo pedido:
• Suma total de todos los números introducidos.
• Media Aritmética de los números introducidos.
• Máximo y mínimo.
• Mediana. 
 * @param {}numeros introducidos en el input
 * @author jose Domene Quesada
 * @return {number,number,number,number,number} nos la suma de los numeros,la media de los numeros, el mayor, el menor y el numero que hay en el medio del array
 */
const myArray = [];
function sumNum(){

  let numeroString = document.getElementById("numero").value;
  
  let sum = 0;
  let numberOfNum = 0;
  let mayor = 0;
  let menor = 0;

  if( (numeroString == 'fin' || numeroString == 'FIN' )  ){
    document.getElementById("myBtn").disabled = true;
    for(let i = 0; i <myArray.length; i++){
      sum += myArray[i];
      numberOfNum++;
    }
    
    mayor = Math.max(...myArray);   
    menor = Math.min(...myArray);
    let media = sum/numberOfNum;
    myArray.sort(ordenar);

    document.getElementById("sum").innerHTML ="La suma de numeros es : "+ sum;
    document.getElementById("media").innerHTML ="La media de numeros es : "+ media
    document.getElementById("maxymin").innerHTML ="El mayor numero es : "+ mayor + " y el menor es: " +menor; 
    
    let mediana = 0;
    let mediana2 = 0;
    if((myArray.length)%2 == 0){
      mediana= myArray[Math.floor(myArray.length/2)];
      mediana2= myArray[(Math.floor(myArray.length/2)) -1];
      console.log((mediana+mediana2)/2);
      document.getElementById("mediana").innerHTML ="La mediana es : "  +(mediana+mediana2)/2;
    }
    else{
      mediana= myArray[Math.floor(myArray.length/2)];
      document.getElementById("mediana").innerHTML ="La mediana es : "  +mediana;
    }  

  }
  else{
    if(!isNaN(numeroString)){
      let numero = parseInt(numeroString);
      myArray.push(numero);
      
    }
    else{
      window.alert("no es un numero");
    }
    
  }

}

