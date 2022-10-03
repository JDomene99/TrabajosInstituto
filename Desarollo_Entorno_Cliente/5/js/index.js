
//Ejercicio A
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
    myArray.sort();
    let mediana= 0;
    
    for(let i=0; i<myArray.length/2; i++) {
      mediana = myArray[i];
    }
    document.getElementById("sum").innerHTML ="La suma de numeros es : "+ sum;
    document.getElementById("media").innerHTML ="La media de numeros es : "+ media
    document.getElementById("maxymin").innerHTML ="El mayor numero es : "+ mayor + " y el menor es: " +menor;
    document.getElementById("mediana").innerHTML ="La mediana es : "  +mediana;

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

