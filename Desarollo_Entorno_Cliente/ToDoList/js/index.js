const $table = document.querySelector('.tableTask');
const $form = document.querySelector('.form');
const $fragement = document.createDocumentFragment();
const $body = document.querySelector('tbody')
const $template = document.querySelector('.template').content;
let tareasRealizadas = 0;
let tareasActivas = 0;
let tareasEliminadas = 0;
let nameToFind = 'vacio';
let comprobarTareasProximas = false;
let $findDate = '';


const getAll = async () => {

    const endPoint = 'http://localhost:3000/tarea';
    try {
        const response = await fetch(endPoint, { cache: 'no-cache' });

        const jsonResponse = await response.json();

        if (!response.ok) {
            throw { status: response.status, statusText: response.statusText }
        }

        jsonResponse.forEach(task => {

            //valor que van a tener las tareas en la tabla
            $template.querySelector('.nameTaskTable').textContent = task.name;
            $template.querySelector('.startDateTaskTable').textContent = formatDate(task.startDate);
            $template.querySelector('.finishDateTaskTable').textContent = formatDate(task.finishDate);
            const diff = (new Date(task.finishDate).getTime() - new Date(task.startDate).getTime());
            $template.querySelector('.timeToEndTaskTable').textContent = Math.floor(diff / (1000 * 60 * 60 * 24));
            const diasRestantes = Math.floor(diff / (1000 * 60 * 60 * 24));

            //dependiendo de su estado las tacha o las pone de otro color
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
            $template.querySelector('.editar').dataset.finishDate = task.finishDate;

            //data-attribute para finalizar
            $template.querySelector('.final').dataset.id = task.id;
            $template.querySelector('.final').dataset.name = task.name;
            $template.querySelector('.final').dataset.startDate = task.startDate;
            $template.querySelector('.final').dataset.finishDate = task.finishDate;


            // para borrar 
            $template.querySelector('.delete').dataset.id = task.id;
            $template.querySelector('.delete').dataset.name = task.name;
            $template.querySelector('.delete').dataset.startDate = task.startDate;
            $template.querySelector('.delete').dataset.finishDate = task.finishDate;

            //filtro para mostrar las tareas por su nombre
            if (task.name.includes(nameToFind)) {

                const tb = $table.querySelector('tbody')
                while (tb.firstChild) {
                    tb.removeChild(tb.firstChild);
                }

                //clonamos e importamos el nombre
                let clonado = document.importNode($template, true);
                $fragement.appendChild(clonado);

            }

            //filtro para mostrar las tareas proximas
            if (comprobarTareasProximas) {

                const tb = $table.querySelector('tbody')
                while (tb.firstChild) {
                    tb.removeChild(tb.firstChild);
                }
                if ($findDate <= diasRestantes) {
                    let clonado = document.importNode($template, true);
                    $fragement.appendChild(clonado);
                }
            }

            //mostrar todas las tareas si no hay ningun flitro
            if (nameToFind == 'vacio' && comprobarTareasProximas == false) {
                let clonado = document.importNode($template, true);
                $fragement.appendChild(clonado);
            }


        });
        $body.appendChild($fragement);

        document.querySelector('.activas').innerText = 'Tareas Activas ' + tareasActivas;
        document.querySelector('.realizadas').innerText = 'Tareas Realizadas ' + tareasRealizadas;

        //recorro el localStorage para saber la cantidad de tareas eliminadas
        const itemLocalStorage = { ...localStorage };
        for (eli in itemLocalStorage) {
            tareasEliminadas++;
        }
        document.querySelector('.eliminadas').innerText = 'Tareas Eliminadas ' + tareasEliminadas;

        //pinto mi grafico con el estado de las tareas
        const cv = document.querySelector('#myChart').getContext('2d');
        const myChart = new Chart(cv, {
            type: "bar",
            data: {
                labels: ['Eliminadas', 'Relaizadas', 'Activas'],
                datasets: [{
                    label: 'Datos de las tareas',
                    data: [tareasEliminadas, tareasRealizadas, tareasActivas],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 205, 86, 0.7)',
                    ],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    } catch (e) {
        console.log(e.status);
    }
}

//cuando carga la pagina cargo todas las tareas
document.addEventListener("DOMContentLoaded", getAll);

//insertar datos 
document.addEventListener('submit', async (e) => {

    if (e.target == $form) {
        e.preventDefault();

        try {
            //cabecera
            const options = {
                method: "POST",
                headers: { "Content-Type": "application/json; charset=utf-8" },
                body: JSON.stringify({ name: e.target.name.value, startDate: new Date(), finishDate: e.target.finishDate.value, status: 'start', })
            };

            let endPoint = '';
            if (e.target.idOculto.value != "") {
                options.method = "PUT";
                endPoint = 'http://localhost:3000/tarea/' + e.target.idOculto.value;
            }
            else {
                endPoint = 'http://localhost:3000/tarea';
            }

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


$table.addEventListener('click', async (e) => {

    //para editar
    if (e.target.matches(".editar")) {
        e.preventDefault();
        const $nameItem = document.querySelector('#nameTask');
        const $startDateTask = document.querySelector('#startDateTask');
        const $finishDateTask = document.querySelector('#finishDateTask');
        const $idItem = document.querySelector('#idItem');
        const $newValueButton = document.querySelector('#sendForm');

        $nameItem.value = e.target.dataset.name;
        $startDateTask.value = e.target.dataset.startDate;
        $finishDateTask.value = e.target.dataset.finishDate;
        $idItem.value = e.target.dataset.id;
        $newValueButton.value = 'Editar';
    }

    //para borrar
    if (e.target.matches(".delete")) {
        e.preventDefault();
        //antes de borrarla la subo al localStorage
        const objToLocalStorage = {
            'name': e.target.dataset.name,
            'startDate': e.target.dataset.startDate,
            'finishDate': e.target.dataset.finishDate,
        }
        localStorage.setItem(e.target.dataset.id, JSON.stringify(objToLocalStorage));

        const options = {
            method: "DELETE",
            headers: { "Content-Type": "application/json" },
        };

        const url =
            "http://localhost:3000/tarea/" + e.target.dataset.id;

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
    }

    //para
    if (e.target.matches(".final")) {
        e.preventDefault();
        try {
            //cabecera
            const options = {
                method: "PUT",
                headers: { "Content-Type": "application/json; charset=utf-8" },
                body: JSON.stringify({ name: e.target.dataset.name, startDate: e.target.dataset.startDate, finishDate: e.target.dataset.finishDate, status: 'finish', })
            };

            const endPoint = 'http://localhost:3000/tarea/' + e.target.dataset.id;
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


//evento en el que recojo el nombre del buscador de tareas
const $botonBuscar = document.querySelector('#nameTasktoFind');
$botonBuscar.addEventListener('input', (e) => {
    e.preventDefault();
    nameToFind = document.querySelector('#nameTasktoFind').value;
    getAll();

});

//evento que recojo cuando quiero saber las tareas proximas a su fecha
const $botonBuscarDate = document.querySelector('#findDate');
$botonBuscarDate.addEventListener('input', (e) => {
    e.preventDefault();
    $findDate = document.querySelector('#findDate').value;
    comprobarTareasProximas = true;
    getAll();

});


//funcion que formatea las fechas
function formatDate(date) {
    date = new Date(date);
    const dateFormatted = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear() + " " + date.getHours() + ":" + date.getMinutes();
    return dateFormatted;
}
