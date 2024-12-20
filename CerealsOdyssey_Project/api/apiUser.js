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

    const encabezados = ['user ID', 'User ID', 'Date', 'Card Number', 'Status', 'Price', 'Price With Discount', 'Discount Value'];

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
            <td>${user.user_id}</td>
            <td>${user.date}</td>
            <td>${user.cardNumber}</td>
            <td>${user.status}</td>
            <td>${user.totalPrice}</td>
            <td>${user.totalDiscount || 'Null'}</td>
            <td>${user.discount_value || 'Null'}</td>
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
    const filtro = document.getElementById('filter').value.toLowerCase();
    const pedidosFiltrados = users.filter(user => user.user_id.toString().includes(filtro));
    crearTabla(pedidosFiltrados);
});

document.getElementById('user-by').addEventListener('change', (event) => {
    const criterio = event.target.value;
    users.sort((a, b) => {
        if (criterio === 'price') {
            return b.totalPrice - a.totalPrice;
        } else if (criterio === 'date') {
            return new Date(b.date) - new Date(a.date);
        } else if (criterio === 'status') {
            return a.status.localeCompare(b.status);
        } else {
            return a[criterio] - b[criterio];
        }
    });
    crearTabla(users);
});

document.getElementById('submituser').addEventListener('click', () => {
    const price = document.getElementById('floatingPrice').value;
    const cardNumber = document.getElementById('floatingCardNumber').value;
    const status = document.getElementById('floatingStatus').value;

    console.log("Valores capturados:", { price, cardNumber, status });
    console.log(user_ID);

    if (user_ID == 0) {
        const user_id = document.getElementById('floatingUser').value;
        createuser({ user_id, price, cardNumber, status })
    } else {
        modifyuser(user_ID, { price, cardNumber, status });
    }
});

// Funcion para hacer Modificar
async function modifyuser(user_ID, userData) {
    try {
        console.log(`Modificando pedido ID: ${user_ID} con datos:`, userData);

        const requestBody = {
            userID: user_ID,
            status: userData.status,
            price: userData.price,
            cardNumber: userData.cardNumber,
        };

        console.log("Datos: " + userData.price + userData.status);

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
        user_id: userData.user_id,
        status: userData.status,
        price: userData.price,
        cardNumber: userData.cardNumber,
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
document.getElementById('Deleteuser').addEventListener('click', () => {
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