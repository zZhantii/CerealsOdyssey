import { User } from './model/User.js';
const apiUrlGet = '?controller=api&action=get_users';
const apiUrlCreate = '?controller=api&action=create_user';
const apiUrlModify = '?controller=api&action=modify_user';
const apiUrlDelete = '?controller=api&action=delete_user';
let users = [];
let user_ID = 0;

document.getElementById('createTable').addEventListener('click', getusers);

async function getusers() {
    try {
        const response = await fetch(apiUrlGet);
        if (!response.ok) {
            throw new Error(`Error en la red: ${response.status} - ${response.statusText}`);
        }
        const data = await response.json();
        users = data.data || data;

        if (users.length > 0) {
            crearTabla(users);
        } else {
            document.getElementById('tablaContainer').innerHTML = '<p>No se encontraron pedidos.</p>';
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

function crearTabla(users) {
    const tablaContainer = document.getElementById('tablaContainer');
    tablaContainer.innerHTML = '';

    const tabla = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    const encabezados = ['user_id', 'First Name', 'Last Name', 'Password', 'Email', 'rol'];

    const filaEncabezado = document.createElement('tr');
    encabezados.forEach(encabezado => {
        const th = document.createElement('th');
        th.textContent = encabezado;
        filaEncabezado.appendChild(th);
    });
    thead.appendChild(filaEncabezado);

    users.forEach(user => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${user.user_id}</td>
            <td>${user.firstName}</td>
            <td>${user.lastName}</td>
            <td>${user.password}</td>
            <td>${user.email}</td>
            <td>${user.rol}</td>
        `;

        fila.addEventListener('dblclick', () => seleccionarFila(user.user_id, fila));
        tbody.appendChild(fila);
    });

    tabla.appendChild(thead);
    tabla.appendChild(tbody);
    tablaContainer.appendChild(tabla);
}

function seleccionarFila(userID, fila) {
    document.querySelectorAll('tbody tr').forEach(tr => tr.classList.remove('selected'));
    fila.classList.add('selected');
    user_ID = userID;
    document.getElementById('ID').innerHTML = '<p>ID</p> ' + user_ID;
    console.log('ID seleccionado:', user_ID);
}

document.getElementById('apply-filter').addEventListener('click', () => {
    const filtroID = document.getElementById('filter-user-id').value.toLowerCase();
    const filtroName = document.getElementById('filter-name').value.toLowerCase();
    const filtrolastName = document.getElementById('filter-lastName').value.toLowerCase();
    const filtroEmail = document.getElementById('filter-email').value.toLowerCase();
    const filtroRol = document.getElementById('filter-rol').value.toLowerCase();

    const pedidosFiltrados = users.filter(user => {
        const matchID = filtroID ? user.user_id.toString().toLowerCase().includes(filtroID) : true;
        const matchName = filtroName ? user.firstName.toLowerCase().includes(filtroName) : true;
        const matchLastName = filtrolastName ? user.lastName.toLowerCase().includes(filtrolastName) : true;
        const matchEmail = filtroEmail ? user.email.toLowerCase().includes(filtroEmail) : true;
        const matchRol = filtroRol ? user.rol.toLowerCase().includes(filtroRol) : true;

        return matchID && matchName && matchLastName && matchEmail && matchRol;
    });

    console.log(pedidosFiltrados);
    crearTabla(pedidosFiltrados);
});

document.getElementById('user-by').addEventListener('change', (event) => {
    const criterio = event.target.value;
    users.sort((a, b) => {
        if (criterio === 'user_id') {
            return b.user_id - a.user_id;
        } else if (['firstName', 'lastName', 'email', 'rol'].includes(criterio)) {
            return b[criterio].localeCompare(a[criterio]);
        } else {
            return a[criterio] - b[criterio];
        }
    });
    crearTabla(users);
});


document.getElementById('submitUser').addEventListener('click', () => {
    const email = document.getElementById('floatingEmail').value;
    const firstName = document.getElementById('floatingFirstName').value;
    const lastName = document.getElementById('floatingLastName').value;
    const password = document.getElementById('floatingPassword').value;
    const rol = document.getElementById('floatingRol').value;

    console.log("Valores capturados:", { email, firstName, lastName, password, rol });
    console.log(user_ID);

    if (user_ID == 0) {
        createuser({ email, firstName, lastName, password, rol })
    } else {
        modifyuser(user_ID, { email, firstName, lastName, password, rol });
    }
});

// Funcion para hacer Modificar
async function modifyuser(user_ID, userData) {
    try {
        console.log(`Modificando pedido ID: ${user_ID} con datos:`, userData);

        const requestBody = {
            userID: user_ID,
            email: userData.email,
            firstName: userData.firstName,
            lastName: userData.lastName,
            password: userData.password,
            rol: userData.rol
        };

        const response = await fetch(apiUrlModify, {
            method: 'PUT',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(requestBody),
        });

        if (!response.ok) {
            throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
        }

        const data = await response.text();
        console.log('Respuesta del servidor:', data);

        await getusers();
    } catch (error) {
        console.error('Error modificando el pedido:', error);
    }
}

// Funcion para crear Pedidos
async function createuser(userData) {
    console.log('Creando pedido con datos:', userData);

    const requestBody = {
        email: userData.email,
        firstName: userData.firstName,
        lastName: userData.lastName,
        password: userData.password,
        rol: userData.rol
    };

    console.log("Datos: " + userData.user_id + userData.status);

    const response = await fetch(apiUrlCreate, {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(requestBody),
    });

    if (!response.ok) {
        console.error('Error en la respuesta del servidor:', response.statusText);
        return;
    }

    const dataPetition = await response.text();
    console.log(dataPetition);

    await getusers();
}

// Funcion para hacer Delete
document.getElementById('DeleteUser').addEventListener('click', () => {
    const selectedRow = document.querySelector('tr.selected');
    if (!selectedRow) {
        alert('Selecciona un pedido primero.');
        return;
    }
    const user_ID = selectedRow.cells[0].textContent;
    deleteuser(user_ID);
});

async function deleteuser(user_ID) {
    console.log(user_ID);
    const response = await fetch(apiUrlDelete, {
        method: 'DELETE',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(user_ID)
    });

    if (!response.ok) {
        console.error('Error en la respuesta del servidor:', response.statusText);
        return;
    }

    const dataPetition = await response.text();
    console.log(dataPetition);

    await getusers();
}