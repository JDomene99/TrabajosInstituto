const $table = document.querySelector('.table');
const $form = document.querySelector('.form');
const $fragement = document.createDocumentFragment();
const $body = document.querySelector('tbody')
const $template = document.querySelector('.template').content;
let tareasRealizadas = 0;
let tareasActivas = 0;
let nameToFind = 'vacio';


const $botonBuscar = document.querySelector('#toFind');
$botonBuscar.addEventListener('click', (e) => {
    e.preventDefault();
    nameToFind = document.querySelector('#nameTasktoFind').value;
    getAll();

});

// const $botonBuscarDate = document.querySelector('#toFindDate');
// $botonBuscarDate.addEventListener('click', (e) => {
//     e.preventDefault();
//     date = new Date();
//     dateFormatted = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();

//     // getAll();

// });

function formatDate(date) {
    date = new Date(date);
    const dateFormatted = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear() + " " + date.getHours() + ":" + date.getMinutes();
    return dateFormatted;
}

const getAll = async () => {

    const endPoint = 'http://localhost:3000/tarea';
    try {
        const response = await fetch(endPoint, { cache: 'no-cache' });

        const jsonResponse = await response.json();

        if (!response.ok) {
            throw { status: response.status, statusText: response.statusText }
        }

        jsonResponse.forEach(task => {

            $template.querySelector('.nameTaskTable').textContent = task.name;
            $template.querySelector('.startDateTaskTable').textContent = formatDate(task.startDate);
            $template.querySelector('.finishDateTaskTable').textContent = formatDate(task.finishDate);

            if (task.status == 'start') {
                tareasActivas++;
                $template.querySelector('.nameTaskTable').style.color = 'green';
                $template.querySelector('.nameTaskTable').style.textDecoration = 'none';

            }
            if (task.status == 'finish') {
                tareasRealizadas++;
                $template.querySelector('.nameTaskTable').style.color = 'blue';
                $template.querySelector('.nameTaskTable').style.textDecoration = 'line-through';
            }


            //añadimos data-attributte con los elementos id, name, startDate, finishDate
            //para updatear
            $template.querySelector('.editar').dataset.id = task.id;
            $template.querySelector('.editar').dataset.name = task.name;
            $template.querySelector('.editar').dataset.startDate = task.startDate;
            $template.querySelector('.editar').dataset.finishDate = (task.finishDate);

            //data-attribute para finalizar
            $template.querySelector('.final').dataset.id = task.id;
            $template.querySelector('.final').dataset.name = task.name;
            $template.querySelector('.final').dataset.startDate = task.startDate;
            $template.querySelector('.final').dataset.finishDate = (task.finishDate);


            // para borrar 
            $template.querySelector('.delete').dataset.id = task.id;
            $template.querySelector('.delete').dataset.name = task.name;
            $template.querySelector('.delete').dataset.startDate = task.startDate;
            $template.querySelector('.delete').dataset.finishDate = (task.finishDate);

            if (task.name.includes(nameToFind)) {

                const tb = $table.querySelector('tbody')
                while (tb.firstChild) {
                    tb.removeChild(tb.firstChild);
                }

                //clonamos e importamos el nombre
                let clonado = document.importNode($template, true);
                $fragement.appendChild(clonado);

            }

            if (nameToFind == 'vacio') {
                let clonado = document.importNode($template, true);
                $fragement.appendChild(clonado);
            }


        });
        $body.appendChild($fragement);

        //funcion para borrar
        const $deleteButtons = document.querySelectorAll('.delete');
        deleteTask($deleteButtons);

        //funcion para finalizar
        const $finalButtons = document.querySelectorAll('.final');
        finalTask($finalButtons);

        //funcion para editar
        const $editButtons = document.querySelectorAll('.editar');
        editTask($editButtons);


        document.querySelector('.activas').innerText = 'Tareas Activas ' + tareasActivas;
        document.querySelector('.realizadas').innerText = 'Tareas Realizadas ' + tareasRealizadas;

        const itemLocalStorage = { ...localStorage };
        let tareasEliminadas = 0;
        for (eli in itemLocalStorage) {
            tareasEliminadas++;
        }
        document.querySelector('.eliminadas').innerText = 'Tareas Eliminadas ' + tareasEliminadas;

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
        const finshDatte = new Date(e.target.finishDate.value);
        console.log(e.target.finishDate.value);
        console.log(new Date(e.target.finishDate.value));
        try {
            //cabecera
            const options = {
                method: "POST",
                headers: { "Content-Type": "application/json; charset=utf-8" },
                body: JSON.stringify({ name: e.target.name.value, startDate: new Date(), finishDate: finshDatte, status: 'start', })
            };

            let endPoint = '';
            if (e.target.idOculto.value != "") {
                options.method = "PUT";
                endPoint = 'http://localhost:3000/tarea/' + e.target.idOculto.value;
            }
            else {
                endPoint = 'http://localhost:3000/tarea';
            }

            console.log(endPoint);

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

function deleteTask(deleteButtons) {
    deleteButtons.forEach(deleteButtons => {

        deleteButtons.addEventListener('click', async (e) => {
            const objToLocalStorage = {
                'name': deleteButtons.dataset.name,
                'startDate': formatDate(new Date()),
                'finishDate': deleteButtons.dataset.finishDate,
            }
            localStorage.setItem(deleteButtons.dataset.id, JSON.stringify(objToLocalStorage));

            const options = {
                method: "DELETE",
                headers: { "Content-Type": "application/json" },
            };

            const url =
                "http://localhost:3000/tarea/" + deleteButtons.dataset.id;

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


const $nameItem = document.querySelector('#nameTask');
const $startDateTask = document.querySelector('#startDateTask');
const $finishDateTask = document.querySelector('#finishDateTask');
const $idItem = document.querySelector('#idItem');
function editTask(editButton) {
    editButton.forEach(button => {

        button.addEventListener('click', async (e) => {
            $nameItem.value = button.dataset.name;
            $startDateTask.value = formatDate(new Date());
            $finishDateTask.value = button.dataset.finishDate;
            $idItem.value = button.dataset.id;

        });
    });
}


function finalTask(deleteButtons) {

    deleteButtons.forEach(button => {

        button.addEventListener('click', async (e) => {

            try {
                //cabecera
                const options = {
                    method: "PUT",
                    headers: { "Content-Type": "application/json; charset=utf-8" },
                    body: JSON.stringify({ name: button.dataset.name, startDate: button.dataset.startDate, finishDate: button.dataset.finishDate, status: 'finish', })
                };

                const endPoint = 'http://localhost:3000/tarea/' + button.dataset.id;
                console.log(endPoint);

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


        });

    });
}

