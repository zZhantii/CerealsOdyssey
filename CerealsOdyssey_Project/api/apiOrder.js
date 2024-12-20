import { Order } from './model/Order.js';
const apiUrlGet = '?controller=api&action=get_orders';
const apiUrlCreate = '?controller=api&action=create_order';
const apiUrlModify = '?controller=api&action=modify_order';
const apiUrlDelete = '?controller=api&action=delete_order';
let orders = [];
let order_ID = 0;

document.getElementById('createTable').addEventListener('click', getOrders);

async function getOrders() {
    try {
        const response = await fetch(apiUrlGet);
        if (!response.ok) {
            throw new Error(`Error en la red: ${response.status} - ${response.statusText}`);
        }
        const data = await response.json();
        orders = data.data || data;

        if (orders.length > 0) {
            crearTabla(orders);
        } else {
            document.getElementById('tablaContainer').innerHTML = '<p>No se encontraron pedidos.</p>';
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

function crearTabla(orders) {
    const tablaContainer = document.getElementById('tablaContainer');
    tablaContainer.innerHTML = '';

    const tabla = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    const encabezados = ['Order ID', 'User ID', 'Date', 'Card Number', 'Status', 'Price', 'Price With Discount', 'Discount Value'];

    const filaEncabezado = document.createElement('tr');
    encabezados.forEach(encabezado => {
        const th = document.createElement('th');
        th.textContent = encabezado;
        filaEncabezado.appendChild(th);
    });
    thead.appendChild(filaEncabezado);

    orders.forEach(order => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${order.order_id}</td>
            <td>${order.user_id}</td>
            <td>${order.date}</td>
            <td>${order.cardNumber}</td>
            <td>${order.status}</td>
            <td>${order.totalPrice}</td>
            <td>${order.totalDiscount || 'Null'}</td>
            <td>${order.discount_value || 'Null'}</td>
        `;

        fila.addEventListener('dblclick', () => seleccionarFila(order.order_id, fila));
        tbody.appendChild(fila);
    });

    tabla.appendChild(thead);
    tabla.appendChild(tbody);
    tablaContainer.appendChild(tabla);
}

function seleccionarFila(orderID, fila) {
    document.querySelectorAll('tbody tr').forEach(tr => tr.classList.remove('selected'));
    fila.classList.add('selected');
    order_ID = orderID;
    document.getElementById('ID').innerHTML = '<p>ID</p> ' + order_ID;
    console.log('ID seleccionado:', order_ID);
}

document.getElementById('apply-filter').addEventListener('click', () => {
    const filtro = document.getElementById('filter').value.toLowerCase();
    const pedidosFiltrados = orders.filter(order => order.user_id.toString().includes(filtro));
    crearTabla(pedidosFiltrados);
});

document.getElementById('order-by').addEventListener('change', (event) => {
    const criterio = event.target.value;
    orders.sort((a, b) => {
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
    crearTabla(orders);
});

document.getElementById('submitOrder').addEventListener('click', () => {
    const price = document.getElementById('floatingPrice').value;
    const cardNumber = document.getElementById('floatingCardNumber').value;
    const status = document.getElementById('floatingStatus').value;

    console.log("Valores capturados:", { price, cardNumber, status });
    console.log(order_ID);

    if (order_ID == 0) {
        const user_id = document.getElementById('floatingUser').value;
        createOrder({ user_id, price, cardNumber, status })
    } else {
        modifyOrder(order_ID, { price, cardNumber, status });
    }
});

// Funcion para hacer Modificar
async function modifyOrder(order_ID, orderData) {
    try {
        console.log(`Modificando pedido ID: ${order_ID} con datos:`, orderData);

        const requestBody = {
            orderID: order_ID,
            status: orderData.status,
            price: orderData.price,
            cardNumber: orderData.cardNumber,
        };

        console.log("Datos: " + orderData.price + orderData.status);

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

        await getOrders();
    } catch (error) {
        console.error('Error modificando el pedido:', error);
    }
}

// Funcion para crear Pedidos
async function createOrder(orderData) {
    console.log('Creando pedido con datos:', orderData);

    const requestBody = {
        user_id: orderData.user_id,
        status: orderData.status,
        price: orderData.price,
        cardNumber: orderData.cardNumber,
    };

    console.log("Datos: " + orderData.user_id + orderData.status);

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

    await getOrders();
}

// Funcion para eliminar
// Funcion para hacer Delete
document.getElementById('DeleteOrder').addEventListener('click', () => {
    const selectedRow = document.querySelector('tr.selected');
    if (!selectedRow) {
        alert('Selecciona un pedido primero.');
        return;
    }
    const order_ID = selectedRow.cells[0].textContent;
    deleteOrder(order_ID);
});

async function deleteOrder(order_ID) {
    console.log(order_ID);
    const response = await fetch(apiUrlDelete, {
        method: 'DELETE',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(order_ID)
    });

    if (!response.ok) {
        console.error('Error en la respuesta del servidor:', response.statusText);
        return;
    }

    const dataPetition = await response.text();
    console.log(dataPetition);

    await getOrders();
}