function myButton2(id, text, colors){
    console.log()
}

// function getNumero1(){
//     let numero = document.getElementById("n1").value;
//     console.log(numero);
// }

// function getNumero2(){
//     let numero = document.getElementById("n1").value;
//     console.log(numero);
// }

// function getNumero3(){
//     let numero = document.getElementById("n1").value;
//     console.log(numero);
// }


function getNumer(a,b,c){
    return (b*b - 4*a*c);
} 

function solucion(a, b, c, sol){
 var disc = getNumer(a,b,c);
 if (disc < 0)
    console.log("Sin solución real");
 else{
    sol[0] = (-b + Math.sqrt(disc))/(2*a);
    sol[1] = (-b - Math.sqrt(disc))/(2*a);
    } 
    console.log(sol[0]);
} 

// crear un script que permite resolver una ecuacion de segundo grado, se le pasa por parametro los 
// coeficientes de segundo grado. NOs muestra por pantalla: punto de corte con el eje de las x y y 
// . y el vertice.