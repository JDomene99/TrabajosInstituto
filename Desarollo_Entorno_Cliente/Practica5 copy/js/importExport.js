export function getInfoUser(){

    const name = document.getElementById('nameUser').value;
    const dni = document.getElementById('dniUser').value;
    const fechaNaci = document.getElementById('fechaNaciUser').value;
    const cp = document.getElementById('cpUser').value;
    
    if(checkCp(cp) && checkDni(dni) ){
        const user = new Usuario(name,dni,fechaNaci,cp);
        saveUser(user);
        document.getElementById('usuariosAdded').innerText ='Nombre: '+ user.getNombre;
    } 
}

export function saveUser(user){
    
    if(localStorage.getItem(user.getDni) != null){
        localStorage.setItem(user.getDni, JSON.stringify(user));
    }
    else{
        window.alert('Ese dni ya existe');
    }
    
}

export function getEdad(fechaNaci){
    const date = new Date(fechaNaci);
    if(date.getMonth()+1 < new Date().getMonth()+1){
        return new Date().getFullYear()-date.getFullYear();
    }
    
}

export function checkDni(dni){
    const dniClone = dni.substring(0, 8);
    const letraDni = dni.substring(8);
    const letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    return letraDni == letras[dniClone % 23]
}

export function checkCp(cp){
    return /[0-9]{5}/.test(cp);
}