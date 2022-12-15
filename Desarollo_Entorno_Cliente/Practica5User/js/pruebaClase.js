import { getInfoUser, saveUser, getEdad, checkDni, checkCp } from "./importExport.js";
/**
 *  clase nombre,dni,fechaNacimiento,cp
 * a) crear un fichero adicional que sea comporbaciones.js que me calcule la edad que tengo(calculoEdad) verifique que el dni es correcto
 * funcion obtener letra dni y comprar el codigo postal para que sea un numero de 5 digitos
 * crear un formulario utilizando la libreria bootstrap  con los siguientes campos
 * cada vez que insertemos un usuario
 * cada vez que le de a insertar me creara un div donde se ira añadiendo un usuario
 * esta informacion debe guardarse en el localstorage siendo imposible añadir un usuario con el mismo dni
 * para ello cuando iniciamos la pagina web debemos hacer una lectrua del localstorage y cargar los elementos que hay
 * 
 */

class Usuario {
    constructor(name, dni, fechaNacimiento, cp) {
        this._name = name;
        this._dni = dni;
        this._fechaNacimiento = fechaNacimiento;
        this._cp = cp;
    }

    //metodos
    set setNombre(newNombre) {
        this._name = newNombre;
    }

    get getNombre() {
        return this._name;
    }

    set setDni(newDni) {
        this._dni = newNombre;
    }

    get getDni() {
        return this._dni;
    }

    set setfechaNacimiento(newfecha) {
        this._fechaNacimiento = fechaNacimiento;
    }

    get getfechaNacimiento() {
        return this._fechaNacimiento;
    }

    set setCp(newfecha) {
        this._cp = cp;
    }

    get getCp() {
        return this._cp;
    }


}

    // Coincidencias Basicas:
    //     . - Cualquier Caracter, excepto nueva linea
    //     \d - Cualquier Digitos (0-9)
    //     \D - No es un Digito (0-9)
    //     \w - Caracter de Palabra (a-z, A-Z, 0-9, _)
    //     \W - No es un Caracter de Palabra.
    //     \s - Espacios de cualquier tipo. (espacio, tab, nueva linea)
    //     \S - No es un Espacio, Tab o nueva linea.
    // Límites:	
    //     \b - Limite de Palabra
    //     \B - No es un Limite de Palabra
    //     ^ - Inicio de una cadena de texto
    //     $ - Final de una cadena de texto
    // Cuantificadores:	
    //     * - 0 o Más
    //     + - 1 o Más
    //     ? - 0 o Uno
    //     {3} - Numero Exacto
    //     {3,4} - Rango de Numeros (Minimo, Maximo)
    // Conjuntos de Caracteres:	
    //     [] - Caracteres dentro de los brackets
    //     [^ ] - Caracteres que NO ESTAN dentro de los brackets
    // Grupos:	
    //     ( ) - Grupo
    //     | - Uno u otro


//ejemplos expresiones regulares

//CODIGO POSTAL = /^\d{5}/g

//DNI = /^[0-9]{8}[A-Z]{1}/g

//TELEFONO = /^[0-9]{9}/g

//NOMBNRE = /^[A-Z]{1}[a-z]/g