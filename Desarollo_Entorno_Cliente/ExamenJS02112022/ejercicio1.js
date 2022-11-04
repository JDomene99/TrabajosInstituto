/**
 (EJERCICIO 1) Disponemos de la siguiente estructura. SerralloCinema se pide:  
  Lanzar un console.log( ) por cada apartado, para visualizar el resultado.
 */
const serralloCinema = {
  taquillera: [
    {
      pelicula: "Star Wars Episode VII(2015)",
      recaudacion: "recaudación $2068000000",
      rating: 7.8,
    },
    {
      pelicula: "The Avengers (2012)",
      recaudacion: "recaudación $1518812000",
      rating: 8,
    },
    {
      pelicula: "Avatar(2009)",
      recaudacion: "recaudación $2788000000",
      rating: 7.8,
    },
    {
      pelicula: "Titanic(1997)",
      recaudacion: "recaudación $2187000000",
      rating: 7.9,
    },
    {
      pelicula: "Avengers Infinity War(2018)",
      recaudacion: "recaudación $2046000000",
      rating: 8.4,
    },
    {
      pelicula: "Jurassic World(2015)",
      recaudacion: "recaudación $1671713000",
      rating: 6.9,
    },
  ],
  mejores: [
    {
      pelicula: "1.-El rey Leon(1994)",
      descripcion:
        "La sabana africana es el escenario en el que rienen lugar las aventuras de Simba, un pequño leon que es el heredero del trono.",
    },
    {
      pelicula: "2.-Toy Story(1995)",
      descripcion:
        "Los juguetes de Andy, un niño de 6 años, temen que haya llegado su hora y que un nuevo regalo de cumpleaños les destruya en el corazon de su dueño",
    },
    {
      pelicula: "3.-Shrek(2001)",
      descripcion:
        "Hace mucho tiempo, un feroz ogro llamado Shrek. Vivia tranquilamente, un dia, su soledad se ve interrumpida por una invasión de sorprendentes personajes.",
    },
    {
      pelicula: "4.-Frozen(2013)",
      descripcion:
        "Cuando una profecía condena a un reino a vivir en invierno eterno, la joven Anna,el temerario montañero Kristoff y el reno Sven emprenden un viaje épico en busca de Elsa.",
    },
    {
      pelicula: "5.-UP(2009)",
      descripcion:
        "Carl Fredricksen es un viudo vendedor de globos de 78 años que, consigue llevar a cabo el sueño de su vida:enganxhar miles de globos a su casa.",
    },
    {
      pelicula: "6.-Monsters Inc(2001)",
      descripcion:
        "Monsters Inc. es la mayor empresa de miedo del mundo, y James P. sullivan es uno de sus mejores empreados.Asustar a los niños no es un trabajo fácil.",
    },
  ],
};

// --------------------------------------- SOLUCIÓN ----------------------------------
// a) Crear una función llamada serralloTaquilleras que al pasar como parámetro la estructura SerralloCinema me devuelva una estructura de tipo
//    Map con las películas más taquilleras. Dicha estructura ha de tener el nombre de la película, la recaudación, el rating y el año de estreno. (2p)

function serralloTaquilleras(obj){
  const mapTaqui = new Map();
  for(let p of obj.taquillera){
    const ano = p.pelicula.split('(')[1].split(')')[0];
    const rating = p.rating;
    const nombre = p.pelicula.split('(')[0];
    const recaudacion = p.recaudacion.split('$')[1];
    mapTaqui.set(nombre, {ano,rating,recaudacion});
  }
  return mapTaqui
}

console.log(serralloTaquilleras(serralloCinema));


// b) Crear una arrow function  que al pasar como parámetro un año y una estructura Map, me muestre los datos de las películas taquilleras
// de ese año almacenadas.  (1,5p)

const ejer2 = (fecha, map) =>{
  const mapTaqui = new Map();
  for(let [key,value] of map.entries()){
    const ano = value.ano
    const rating = value.rating;
    const recaudacion = value.recaudacion;
    if(ano === fecha){
      mapTaqui.set(key, {ano,rating,recaudacion});
    }
  }
  return mapTaqui;
}
console.log(ejer2('2015',serralloTaquilleras(serralloCinema)));

// c) Crear una función anónima que al pasar la estructura Map, calcule la media aritmética de la recaudación obtenida por las películas más 
// taquilleras. (1,5p)

const ejer3 = (map) =>{
  let suma = 0;
  for(let [key,value] of map.entries()){
   suma += (parseInt)(value.recaudacion);
  }
  suma/map.size;
  return suma;
}
console.log(ejer3(serralloTaquilleras(serralloCinema)));



// d) Crear una función llamada yearMejores que al pasar como parámetro nuestra estructura SerralloCinema, me devuelva un array con los años  
// de las Mejores Películas sin repetir ningún año.  (1,5p)

const yearMejores = (obj) =>{
  const setMejores = [];
  for(let p of obj.mejores){
    const ano = p.pelicula.split('(')[1].split(')')[0];
    const nombre = p.pelicula.split('(')[0];
    setMejores.push(ano);
  }
  
  
}
console.log((yearMejores(serralloCinema)));



