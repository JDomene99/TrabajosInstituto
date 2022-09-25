/*
Crear un script de JS que nos permita resolver un ecuación de segundo grado y a la función le pasaré como parametro los coeficientes de la ecuación
 de segundo grado. 
 
 Me tiene que mostrar por pantalla: Punto de corte con el eje de las x, punto de corte con el eje de las y  y el vertice. 
 Para mostrar las coordenadas mostrarlos con sus correspondientes parentesis
*/


function calcularX(a, b, c) {

  let ecuacion1 = (-b) + Math.sqrt(b * b - 4 * a * c) / 2 * a;
  let ecuacion2 = -(-b) - Math.sqrt(b * b - 4 * a * c) / 2 * a;
  let respuesta = " ( " + ecuacion1 + "," + ecuacion2 + " )  ";

  let verificacion = Math.sqrt(b * b - 4 * a * c);

  if (!(verificacion > 0)) {
    alert("La raiz es negativa, no se puede continuar");
  }

  console.log(ecuacion1);

  return respuesta;

}


function verticeY(a, b, c) {
  let vy = a * Math.pow(-b / (2 * a), 2) + b * -b / (2 * a) + c;
  return vy;
}


function verticeX(a, b) {
  let vx = -b / (2 * a);
  return vx;
}

function parabolaSigno(a) {
  let confirmacion = "";
  if (a > 0) {
    confirmacion = "es positiva";

  } else {
    confirmacion = "es negativa";

  }
  return confirmacion;

}

function resultado() {

  let a = document.getElementById("a").value;
  let b = document.getElementById("b").value;
  let c = document.getElementById("c").value;

  document.write("<h1> La  valores X son  </h1>" + calcularX(a, b, c));
  document.write("<h3> El vertice x es </h3>" + verticeX(a, b));
  document.write("<h4> El vertice y es </h4>" + verticeY(a, b, c));
  document.write("<br/><br/><br/> La parabola  " + parabolaSigno(a));




}
