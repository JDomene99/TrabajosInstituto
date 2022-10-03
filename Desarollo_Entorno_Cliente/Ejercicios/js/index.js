/*
crear un scrip que se le pase como parametro el salario, la retencion, el numero de hijos y productividad.
Calcule el salario de los trabajadores segun los siguientes criterios:
-La retencion es un % que afecta al salario que se deduce del salario
-El numero de hijos baja la retencion un 5%(cada hijo)
-la productividad incrementa el sueldo definitivo un %
-crear un metodo
-un prompt

*/
let s = prompt("Introduce un salario:")
let r = prompt("Introduce una retencion:")
let nh = prompt("Introduce un numero de hijos:")
let pro = prompt("Introduce la productividad:")


function calcularSalario(s,r,nh,pro){
  
  let productividad = (s*(pro/100));
  let retencion = (( (nh*5) - (r)  ) )/100 * s;
  let resultado = s - retencion + productividad;

  console.log(resultado);
  document.write("<h1> el resultado es </h1>"+ resultado);

}