/*
Crear un script de JS que nos permita resolver un ecuación de segundo grado y a la función le pasaré como parametro los coeficientes de la ecuación
 de segundo grado. 
 
 Me tiene que mostrar por pantalla: Punto de corte con el eje de las x, punto de corte con el eje de las y  y el vertice. 
 Para mostrar las coordenadas mostrarlos con sus correspondientes parentesis
*/

function calcularEcuacion(a,b,c){

  let raiz = Math.sqrt( b*b -(4*a*c)) ;
  if (raiz < 0 || a === 0) return 0;
  
  let x1 = (-b + raiz) / (2*a);
  let x2 = (-b - raiz) / (2*a);
  
  let v1 = -b / (2*a);
  let v2 = a*(v1*v1) + b*v1 + c;

  let tipoGrafica;

  if(a > 0){
    tipoGrafica = "positva";
  }
  else{
    tipoGrafica = "negativa";
  }

  return [x1,0,x2,0,0,c,y1,y2,tipoGrafica];

}