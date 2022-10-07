let n = 5;
document.write(" <h1> Rombo pedido </h1>");
for (let i = 0; i <= n; i++) {
  //espacios
  for (let j = 0; j<n-i; j++) {
    document.write("");
  }
  //asteriscos
  for (let k = 0; k<2*i-1; k++) {
    document.write("*");
  }
  document.write("<br/>");
}

//hacia abajo
for (let i = 1; i<n; i++) {
  //espacios
  for (let j = 0; j<i; j++) {
    document.write("");
  }
  //asteriscos
  for (let k = 0; k<2*(n-i) - 1; k++) {
    document.write("*");
  }
  
  document.write("<br/>");
}
document.write(" <h1> Rombo custom </h1>");
// por si quieres imprimir un rombo personalizado

/**
 * @description  Crear un script que muestre en una página HTML la siguiente figura:
 * @param {numero}numero el numero lo recoge del input
 * @author jose Domene Quesada
 * @return {} nos escribe en la pagina un "", "*" y "<br/>" dependiendo de la posicion del for
 */
function printDiamondCustom(){

    let n = document.getElementById("numero").value;
    //para centar el rombo en mitad de la pantalla. Si no se queda a un lado y solo se muestra la mitad
    document.write("<center>");

    for (let i = 0; i <= n; i++) {
    //espacios
      for (let j = 0; j<n-i; j++) {
          document.write("");
      }
      //asteriscos
      for (let k = 0; k<2*i-1; k++) {
          document.write("*");
      }
      document.write("<br/>");
    }

    //hacia abajo
    for (let i = 1; i<n; i++) {
      //espacios
      for (let j = 0; j<i; j++) {
          document.write("");
      }
      //asteriscos
      for (let k = 0; k<2*(n-i) - 1; k++) {
          document.write("*");
      }

      document.write("<br/>");
    }
}