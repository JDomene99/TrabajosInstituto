const esp = ["buenos dias","buenas tardes","buenas noches"];
const eng = ["good morning","good afternoon","good night"];
const fra = ["Bonjour","Bonsoir","bonne nuit"];


const languages = [esp,eng,fra];

/**
 * @description Diseña una web con un botón (Saludo), para que al pulsarlo me genere un mensaje de
bienvenida en tres idiomas.
a. El texto de los tres idiomas debe estar almacenado un un array donde cada
elemento del Array sea otro Array que contenga tres mensajes (buenos días,
buenas tardes, buenas noches) en cada uno de los idiomas. Al pulsar el botón
mostrará un mensaje de saludo en cada uno de los tres idiomas, teniendo
presente la hora del día en que nos encontremos. Usar el objeto Date() y dividir
el día en tres franjas.
 * @param 
 * @author jose Domene Quesada
 * @return {}los idiomas dependiendo de la hora que sea
 */
function sendSaludo(){
  let hoy = new Date().getHours();

    if(hoy < 12){
      getLanguage(esp);
      getLanguage(eng);
      getLanguage(fra);
    }

    if(hoy >= 12 || hoy < 5){
      getLanguage(esp);
      getLanguage(eng);
      getLanguage(fra);
    }

    else{
      getLanguage(esp);
      getLanguage(eng);
      getLanguage(fra);
    }
  
}

/* @descripcion funcion la cual le pasas como parametro el nombre del lenguaje 
 * @param  un
 * @author jose Domene Quesada
 * @return {} nos da los valores de las frases
 */

function getLanguage(language){

  let newArr = [...language];

  console.log(newArr);
  for(let i=0; i<newArr.length ;i++){
    document.write(newArr[i] +"<br/>");
  }
  document.write("<br/>");
}