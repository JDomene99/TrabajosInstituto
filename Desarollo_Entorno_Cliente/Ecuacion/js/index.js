/*
Crear un script de JS que nos permita resolver un ecuación de segundo grado y a la función le pasaré como parametro los coeficientes de la ecuación
 de segundo grado. 
 
 Me tiene que mostrar por pantalla: Punto de corte con el eje de las x, punto de corte con el eje de las y  y el vertice. 
 Para mostrar las coordenadas mostrarlos con sus correspondientes parentesis
*/

function getResult(inputValor1, inputValor2, inputValor3){
  let number1 = document.getElementById("inputValor1").value;
  let number2 = document.getElementById("inputValor2").value;
  let number3 = document.getElementById("inputValor3").value;

  let verificacion = Math.sqrt((number2) * (number2) - 4 * number1 * number3);

  if(verificacion > 0){
    let ecuacion1 = ((-number2) + Math.sqrt(Math.pow(number2, 2) - (4 * number1 * number3))) / (2 * number1);
    let ecuacion2 = ((-number2) - Math.sqrt(Math.pow(number2, 2) - (4 * number1 * number3))) / (2 * number1);
    let respuesta = "<b> ( " + ecuacion1 + " , " + ecuacion2 + " ) </b> ";
    let puntoCorteY = "(0 , "+number3+")";
    let puntoCorteX = "(0, "+ecuacion1+")" + " y (0, "+ecuacion2+")";

    document.write("<h1> La  valores X son  </h1>" + respuesta);
    document.write("<h1> Los puntos de corte con la Y son  </h1>" + puntoCorteY);
    document.write("<h1> Los puntos de corte con la x son  </h1>" + puntoCorteX);
    document.write("<h2> El vertice x es </h2>" + verticeX(number1, number2));
    document.write("<h2> El vertice y es </h4>" + verticeY(number1, number2, number3));
    document.write("<br/><br/><br/> La parabola  " + parabolaSigno(number1));
  }
  else{
    alert("La raiz es negativa, no se puede continuar")
  }
  
}

function verticeY(a, b, c) {
  let verticeY = a * Math.pow(-b / (2 * a), 2) + b * -b / (2 * a) + c; 
  return verticeY;
}

function verticeX(a, b) {
  let verticeX = -b / (2 * a);
  return verticeX;
}


function parabolaSigno(a) {
  let respuesta = "";
  a>0 ? respuesta = "es positiva" : respuesta = "es negativa"
  return respuesta;
}
