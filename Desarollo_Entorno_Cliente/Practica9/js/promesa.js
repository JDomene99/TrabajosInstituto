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

            //añadimos data-attributte con los elementos id, name, precio
            //para updatear
            $template.querySelector('.editar').dataset.id = element.id;
            $template.querySelector('.editar').dataset.name = element.name;
            $template.querySelector('.editar').dataset.precio = element.precio;

            // para borrar sol necesito el id
            $template.querySelector('.delete').dataset.id = element.id;

            //clonamos e importamos el nombre
            let clonado = document.importNode($template, true);
            $fragement.appendChild(clonado);

        });
        $body.appendChild($fragement);

        //funcion para borrar
        const $deleteButtons = document.querySelectorAll('.delete');
        deleteItem($deleteButtons);

        //funcion para editar
        const $editButtons = document.querySelectorAll('.editar');
        editItem($editButtons);




    } catch (e) {
        console.log(e.status);
    }
}

//cuando carga la pagina
document.addEventListener("DOMContentLoaded", getAll);

//insertar datos 
document.addEventListener('submit', async (e) => {

    if (e.target == $form) {
        e.preventDefault();
        console.log(e.target.id.value);
        console.log(e.target.name.value);
        try {
            //cabecera
            const options = {
                method: "POST",
                headers: { "Content-Type": "application/json; charset=utf-8" },
                body: JSON.stringify({ name: e.target.name.value, precio: e.target.precio.value, })
            };
            let endPoint = '';
            // if (e.target.id.value != undefined) {
            //     endPoint = 'http://localhost:4000/product' + e.target.id.value;
            // }
            // else {
            endPoint = 'http://localhost:4000/product';
            // }

            const response = await fetch(endPoint, options);
            const jsonResponse = await response.json();

            if (!response.ok) {
                throw { status: response.status, statusText: response.statusText }
            }
            //recargamos la pagina una vez que la peticion post ha sido satisfecha
            location.reload();

        } catch (error) {
            console.log(error.message);
        }
    }
});

function deleteItem(deleteButtons) {
    deleteButtons.forEach(button => {

        button.addEventListener('click', async (e) => {
            const options = {
                method: "DELETE",
                headers: { "Content-Type": "application/json" },
            };

            const url =
                "http://localhost:4000/product/" + button.dataset.id;

            try {
                const res = await fetch(url, options);
                const json = await res.json();

                if (!res.ok) {
                    throw {
                        status: res.status,
                        statusText: res.statusText,
                    };
                }
            } catch (error) {
                console.log(error.message);
            }
        });

    });
}

const $nameItem = document.querySelector('#nameItem');
const $precioItem = document.querySelector('#precioItem');
const $idItem = document.querySelector('#idItem');
function editItem(editButton) {
    editButton.forEach(button => {

        button.addEventListener('click', async (e) => {
            // const options = {
            //     method: "UPDATE",
            //     headers: { "Content-Type": "application/json" },
            // };

            // const url =
            //     "http://localhost:4000/product/" + button.dataset.id;

            // try {
            //     const res = await fetch(url, options);
            //     const json = await res.json();

            //     if (!res.ok) {
            //         throw {
            //             status: res.status,
            //             statusText: res.statusText,
            //         };
            //     }
            // } catch (error) {
            //     console.log(error.message);
            // }
            $nameItem.value = button.dataset.name;
            $precioItem.value = button.dataset.precio;
            $idItem.value = button.dataset.id;

            console.log(button.dataset.id);
            console.log(button.dataset.name);
            console.log(button.dataset.precio);
        });

    });
}
