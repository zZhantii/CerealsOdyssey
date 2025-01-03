import { Order } from './model/Order.js';
const apiUrlGet = '?controller=api&action=get_orders';
const apiUrlCreate = '?controller=api&action=create_order';
const apiUrlModify = '?controller=api&action=modify_order';
const apiUrlDelete = '?controller=api&action=delete_order';
const apiUrlGetProducts = '?controller=api&action=get_products_orders';
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

const selectElement = document.getElementById("floatingOptionsProducts");
const quantityInput = document.getElementById("productQuantity");
const increaseButton = document.getElementById("increaseQuantity");

let selectedProduct = null;
let quantity = 1;
let price = 0;

let products = {};

fetch(apiUrlGetProducts)
    .then(response => {
        if (!response.ok) {
            throw new Error("Error al obtener los productos.");
        }
        return response.json();
    })
    .then(data => {
        data.forEach(option => {
            const optionElement = document.createElement("option");
            optionElement.value = option.product_id;
            optionElement.textContent = option.name;

            products[option.product_id] = option.price;

            selectElement.appendChild(optionElement);
        });
    })
    .catch(error => {
        console.error("Error:", error);
    });

selectElement.addEventListener("change", (event) => {
    selectedProduct = event.target.value;
    price = products[selectedProduct];
    console.log("Producto seleccionado:", selectedProduct, "Precio:", price);
});


increaseButton.addEventListener("click", () => {
    quantity += 1;
    quantityInput.value = quantity;
});

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

document.addEventListener('dblclick', (event) => {
    const tablaContainer = document.getElementById('tablaContainer');
    const selectedRow = document.querySelector('tr.selected');


    if (tablaContainer && !tablaContainer.contains(event.target)) {
        if (selectedRow) {
            selectedRow.classList.remove('selected');
            order_ID = 0;
            document.getElementById('ID').innerHTML = '<p>ID</p> ' + order_ID;
            console.log('ID deseleccionado:', order_ID);
        }
    }
});

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
        if (criterio === 'order_id') {
            return b.order_id - a.order_id;
        } else if (criterio === 'user_id') {
            return b.user_id - a.user_id;
        } else if (criterio === 'status') {
            return a.status.localeCompare(b.status);
        } else if (criterio === 'date') {
            return new Date(b.date) - new Date(a.date);
        } else if (criterio === 'price') {
            return b.totalPrice - a.totalPrice;
        } else {
            return a[criterio] - b[criterio];
        }
    });
    crearTabla(orders);
});

document.getElementById('submitOrder').addEventListener('click', () => {
    const discount = document.getElementById('floatingDiscount').value;
    const cardNumber = document.getElementById('floatingCardNumber').value;
    const status = document.getElementById('floatingStatus').value;

    console.log("Valores capturados:", { discount, cardNumber, status });
    console.log(order_ID);

    if (order_ID == 0) {
        const user_id = document.getElementById('floatingUser').value;
        createOrder({ user_id, discount, cardNumber, status, quantity, selectedProduct, price })
    } else {
        modifyOrder(order_ID, { discount, cardNumber, status });
    }
});

// Funcion para hacer Modificar
async function modifyOrder(order_ID, orderData) {
    try {
        console.log(`Modificando pedido ID: ${order_ID} con datos:`, orderData);

        const requestBody = {
            orderID: order_ID,
            status: orderData.status,
            discount: orderData.discount,
            cardNumber: orderData.cardNumber,
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

        await getOrders();
    } catch (error) {
        console.error('Error modificando el pedido:', error);
    }
}

// Funcion para crear Pedidos
async function createOrder(orderData) {
    const requestBody = {
        user_id: orderData.user_id,
        status: orderData.status,
        discount: orderData.discount,
        cardNumber: orderData.cardNumber,
        amount: quantity,
        product: selectedProduct,
        priceProduct: price
    };

    console.log('Creando pedido con datos:', requestBody);

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