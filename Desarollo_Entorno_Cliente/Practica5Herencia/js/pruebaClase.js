// import { getInfoUser, saveUser, getEdad, checkDni, checkCp } from "./importExport.js";  

class Libro{
    constructor(tittle,autor,pages){
        this._tittle = tittle;
        this._autor = autor;
        this._pages = pages;
    }

    //metodos
    set setTittle(newNombre){
        this._tittle = newNombre;
    }

    get getTittle(){
        return this._tittle;
    }

    mostar(){
        return this._tittle;
    }


}

class Comic extends Libro{
    constructor(tittle,autor,pages,ilustrator){
        super(tittle,autor,pages);
        this._ilustrator = ilustrator;
    }

    //metodos
    set setIlustrator(newNombre){
        this._ilustrator = newNombre;
    }

    get getTittle(){
        return this._ilustrator;
    }

    mostar(){
        return 'Tremendo comic el '+this._tittle;
    }

}


let libro;

// function getDataForm(){
//     let tittle = document.getElementById('insertTittle').value;
//     libro = new Libro(tittle,'autor',200);
//     console.log(libro);
// }

//evento -> addEventListener

const addBook = document.getElementById('idBoton').addEventListener("click", () => {

    let tittle = document.getElementById('insertTittle').value;
    let autor = document.getElementById('insertAutor').value;
    let pag = document.getElementById('insertPag').value;

    libro = new Libro(tittle,autor,pag)
    localStorage.setItem(libro.getTittle, JSON.stringify(libro));
    JSON.parse(localStorage.getItem(libro.getTittle));
    
})

document.getElementById('insertPag').addEventListener("keypress", (evt) => {
    if(evt.key === "Enter"){
        let tittle = document.getElementById('insertTittle').value;
        let autor = document.getElementById('insertAutor').value;
        let pag = document.getElementById('insertPag').value;
    
        libro = new Libro(tittle,autor,pag)
        if(localStorage.getItem(libro.getTittle) == null){
            localStorage.setItem(libro.getTittle, JSON.stringify(libro));
            JSON.parse(localStorage.getItem(libro.getTittle));
            const newDiv = document.createElement("div");
            const newContent = document.createTextNode("Correcto");
            newDiv.appendChild(newContent);

        }
        else{
            const newDiv = document.createElement("div");
            const newContent = document.createTextNode("Error");
            newDiv.appendChild(newContent);
            const currentDiv = document.getElementById("firtId");
            document.body.insertBefore(newDiv, currentDiv);
        }
    }    
})