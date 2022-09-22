document.getElementById("titulo1").innerHTML = "<h2>titulo1</h2>";
document.getElementById("titulo2").innerText = "<h2>titulo2</h2>";

console.log("================================");

/* @author : Jose Domene Quesada
    @version : 1.0.0
    @description :
    Screipt que a traves de una funcion cambie el contenido.Dicha funcion sera llamada desde un click de boton
*/

function myButton(){
    let texto = document.getElementById("changedText")
    texto.innerText = "Texto cambiado";
    return texto;
}

function myButton2(id, text, colors){
    if(id == "changedColor"){
        let etiqueta = document.getElementById(id);
        if(etiqueta.tagName == "H1" || etiqueta.tagName == "H2"){
            etiqueta.innerText = text;
            etiqueta.style.color = colors;
            console.log(etiqueta);
        }
    }
}

// crear un script que permite resolver una ecuacion de segundo grado, se le pasa por parametro los 
// coeficientes de segundo grado. NOs muestra por pantalla: punto de corte con el eje de las x y y 
// . y el vertice.