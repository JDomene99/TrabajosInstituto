const esp = ["buenos dias","buenas tardes","buenas noches"];
const eng = ["good morning","good afternoon","good night"];
const fra = ["Bonjour","Bonsoir","bonne nuit"];
const languages = [esp,eng,fra];

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
//funcion la cual le pasas como parametro el nombre del lenguaje y te da los valores de las frases
function getLanguage(language){

  let newArr = [...language];

  console.log(newArr);
  for(let i=0; i<newArr.length ;i++){
    document.write(newArr[i] +"<br/>");
  }
  document.write("<br/>");
}