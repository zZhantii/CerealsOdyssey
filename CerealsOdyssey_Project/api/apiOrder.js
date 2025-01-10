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
        const storage = sessionStorage.getItem('orders');

        if (storage) {
            console.log('Datos cargados desde sessionStorage');
            orders = JSON.parse(storage);
            crearTabla(orders);
            return;
        }

        const response = await fetch(apiUrlGet);
        if (!response.ok) {
            throw new Error(`Error en la red: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        orders = data.data || data;

        // Almacenar datos en la sessionStorage
        sessionStorage.setItem('orders', JSON.stringify(orders));
        console.log('Datos almacenados: ', orders);

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
    // Resaltamos la fila seleccionada
    document.querySelectorAll('tbody tr').forEach(tr => tr.classList.remove('selected'));
    fila.classList.add('selected');

    // Almacenamos el ID del pedido seleccionado
    order_ID = orderID;
    document.getElementById('ID').innerHTML = '<p>Selected Order ID: </p>' + order_ID;
    console.log('Order ID seleccionado:', order_ID);

    // Buscar el pedido correspondiente en el array orders usando el orderID
    const orderSeleccionado = orders.find(order => order.order_id === orderID);

    if (orderSeleccionado) {
        // Asignamos la información del pedido a los campos del formulario
        document.getElementById('floatingUser').value = orderSeleccionado.user_id || '';
        document.getElementById('floatingCardNumber').value = orderSeleccionado.cardNumber || '';
        document.getElementById('floatingStatus').value = orderSeleccionado.status || '';
        document.getElementById('floatingDiscount').value = orderSeleccionado.discount_value || '';

        console.log('Pedido seleccionado:', orderSeleccionado);
    } else {
        console.log('No se encontró el pedido con ID:', orderID);
    }
}

document.getElementById('apply-filter').addEventListener('click', () => {
    const userIdFilter = document.getElementById('filter-user-id').value.toLowerCase();
    const orderIdFilter = document.getElementById('filter-order-id').value.toLowerCase();
    const dateFilter = document.getElementById('filter-date').value;
    const priceFilter = document.getElementById('filter-price').value;
    const statusFilter = document.getElementById('filter-status').value.toLowerCase();

    const pedidosFiltrados = orders.filter(order => {
        const matchesUserId = userIdFilter ? order.user_id.toString().includes(userIdFilter) : true;
        const matchesOrderId = orderIdFilter ? order.order_id.toString().includes(orderIdFilter) : true;
        const matchesDate = dateFilter ? order.date === dateFilter : true;
        const matchesPrice = priceFilter ? order.totalPrice.toString().includes(priceFilter) : true;
        const matchesStatus = statusFilter ? order.status.toLowerCase().includes(statusFilter) : true;

        return matchesUserId && matchesOrderId && matchesDate && matchesPrice && matchesStatus;
    });

    crearTabla(pedidosFiltrados);
});

document.getElementById('order-by').addEventListener('change', (event) => {
    const criterio = event.target.value;
    orders.sort((a, b) => {
        if (criterio === 'price') {
            return b.totalPrice - a.totalPrice;
        } else if (criterio === 'order_id') {
            return b.order_id - a.order_id;
        } else if (criterio === 'user_id') {
            return b.user_id - a.user_id;
        } else if (criterio === 'date') {
            return new Date(b.date) - new Date(a.date);
        } else if (criterio === 'status') {
            const statusA = a.status || '';
            const statusB = b.status || '';
            return statusA.localeCompare(statusB);
        } else {
            return 0;
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

        const user_id = document.getElementById('floatingUser').value;

        logAudit('modify', {
            user_id: user_id,
            order_id: order_ID,
            status: orderData.status,
            discount: orderData.discount,
            cardNumber: orderData.cardNumber
        });
        await getOrders();
        sessionStorage.removeItem('orders');
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

    const user_id = document.getElementById('floatingUser').value;

    logAudit('create', {
        user_id: user_id,
        order_id: order_ID,
        status: orderData.status,
        discount: orderData.discount,
        cardNumber: orderData.cardNumber,
        product: orderData.product,
        quantity: orderData.amount,
        priceProduct: orderData.priceProduct
    });
    await getOrders();
    sessionStorage.removeItem('orders');


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

    const user_id = document.getElementById('floatingUser').value;

    logAudit('delete', { order_ID, });

    await getOrders();
    sessionStorage.removeItem('orders');
}

// Auditoria
const apiUrlAudit = '?controller=api&action=log_audit_orders';

async function logAudit(operation, details) {
    try {
        const requestBody = {
            operation,
            details
        };

        const response = await fetch(apiUrlAudit, {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(requestBody)
        });

        if (!response.ok) {
            throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
        }

        const data = await response.text();
        console.log('Auditoría registrada con éxito:', data);
    } catch (error) {
        console.error('Error registrando la auditoría:', error);
    }
}

const apiGetUrlAudit = '?controller=api&action=log_get_audi';

async function getAuditLogs() {
    try {
        const response = await fetch(apiGetUrlAudit);
        if (!response.ok) {
            throw new Error(`Error en la red: ${response.status} - ${response.statusText}`);
        }

        const data = await response.json();
        const audits = data.data || data;

        if (audits.length > 0) {
            crearTablaAuditoria(audits);
        } else {
            document.getElementById('tablaContainer').innerHTML = '<p>No se encontraron registros de auditoría.</p>';
        }
    } catch (error) {
        console.error('Error obteniendo registros de auditoría:', error);
    }
}

document.getElementById('createAudi').addEventListener('click', getAuditLogs);

function crearTablaAuditoria(audits) {
    const auditTableContainer = document.getElementById('tablaContainer');
    auditTableContainer.innerHTML = ''; // Limpiar contenido previo

    const table = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    // Encabezados de la tabla
    const headers = ['User_id', 'Operation', 'Date', 'new Data'];
    const headerRow = document.createElement('tr');
    headers.forEach(header => {
        const th = document.createElement('th');
        th.textContent = header;
        headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);

    // Filas de la tabla
    audits.forEach(audit => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${audit.user_id || 'Null'}</td>
            <td>${audit.operation || 'Null'}</td>
            <td>${audit.date || 'Null'}</td>
            <td>${audit.new_data || 'Null'}</td>
        `;
        tbody.appendChild(row);
    });

    table.appendChild(thead);
    table.appendChild(tbody);
    auditTableContainer.appendChild(table);
}


