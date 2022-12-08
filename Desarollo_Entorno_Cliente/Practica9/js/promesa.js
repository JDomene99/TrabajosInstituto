const $table = document.querySelector('.table');
const $form = document.querySelector('.form');
const $fragement = document.createDocumentFragment();
const $body = document.querySelector('tbody')
const $template = document.querySelector('.template').content;




const getAll = async () => {

    const endPoint = 'http://localhost:4000/product';
    try {
        const response = await fetch(endPoint, { cache: 'no-cache' });

        const jsonResponse = await response.json();

        if (!response.ok) {
            throw { status: response.status, statusText: response.statusText }
        }

        jsonResponse.forEach(element => {
            $template.querySelector('.nameTable').textContent = element.name;
            $template.querySelector('.precioTable').textContent = element.precio;
            //clonamos e importamos el nombre
            let clonado = document.importNode($template, true);
            $fragement.appendChild(clonado);

            //añadimos data-attributte con los elementos id, name, precio
            //para updatear
            $template.querySelector('.editar').dataset.id = element.id;
            $template.querySelector('.editar').dataset.name = element.name;
            $template.querySelector('.editar').dataset.precio = element.precio;

            // para borrar sol necesito el id
            $template.querySelector('.delete').dataset.id = element.id;

        });

        $body.appendChild($fragement);


    } catch (e) {
        console.log(e.status);
    }
}

//cuando carga la pagina
document.addEventListener("DOMContentLoaded", getAll);


//delete 
// const $delete = document.querySelector('.delete');
document.addEventListener('submit', async (e) => {

    //insertar datos 
    console.log(e.target);
    console.log(e);
    if (e.target == $form) {
        e.preventDefault();

        try {
            //cabecera
            const options = {
                method: "POST",
                headers: { "Content-Type": "application/json; charset=utf-8" },
                body: JSON.stringify({ name: e.target.name.value, precio: e.target.precio.value, })
            };
            console.log(e.target.name.value);
            const endPoint = 'http://localhost:4000/product';
            const response = await fetch(endPoint, options);
            const jsonResponse = await response.json();

            if (!response.ok) {
                throw { status: response.status, statusText: response.statusText }
            }
            //recargamos la pagina una vez que la peticion post ha sido satisfecha
            location.reload();

        } catch (error) {

        }
    }

    if (e.target == $template) {
        console.log('ada');
        e.preventDefault();
        // try {
        //     //cabecera
        //     const options = {
        //         method: "POST",
        //         headers: { "Content-Type": "application/json; charset=utf-8" },
        //         body: JSON.stringify({ name: e.target.name.value, precio: e.target.precio.value, })
        //     };
        //     console.log(e.target.name.value);
        //     const endPoint = 'http://localhost:4000/product';
        //     const response = await fetch(endPoint, options);
        //     const jsonResponse = await response.json();

        //     if (!response.ok) {
        //         throw { status: response.status, statusText: response.statusText }
        //     }
        //     //recargamos la pagina una vez que la peticion post ha sido satisfecha
        //     location.reload();

        // } catch (error) {

        // }
    }
    //borar datos

});
