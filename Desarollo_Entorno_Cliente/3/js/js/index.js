/*
comprobar que los dos campos esten rellenos.
cuando le damos a guardar, guarda en un array(user = [['pepe',25],['jose',25]])
si la edad es menor que 18 o mayor de 100 le decimos que la edad no es validad.
introducir un nombre en busqueda(obligatorio) si existe me muestra la edad.
si en la busqueda introduzco "@calcular" me sacara la media de la edad de los usuarios.
*/ 
const users = [];
const user = [];

function saveData(){

  let nombre = document.getElementById("nombre").value;
  let edad = document.getElementById("numero").value;

  alertNombre(nombre, edad);
  alertEdad(edad);

  if(!user.includes(nombre)){
    user.push(nombre);
    user.push(edad);
    users.push(user);
  }
}

function alertNombre(nombre,edad){
  let edad2 = parseInt(edad);
  if( (nombre == '' || !isNaN(nombre) || user.includes(nombre) )  || (isNaN(edad2)) ) {
    window.alert("Error");
  }
}

function alertEdad(edad){
  if(edad<18 || edad >100){
    window.alert("edad incorrecta");
  }
}

function findData(){
  texto = document.getElementById("textoToFind").value;
  let sum = 0;
  let cont = 0;
  let entra =  false;
  for(let i = 0; i < users.length; i++){
    
    for(let j = 0; j < user.length; j++){// for para recorrer cada usuario
      //primera posicion encuentra el texto
      if(j==0){
        if(user[j].includes(texto)){
          entra = true;
        }
      }
      //segunda posicion encuentra la edad
      if(j==1){
        if(texto == '@calcular'){
          let newnum = parseInt(user[j]);
          sum = newnum+sum;
          cont ++;
        }
        if(entra){
          document.write(user[j]);
        }
      }
    }
  }
  if(cont !=0 ){
    let media = sum/cont;
    document.write(media);
  }
}