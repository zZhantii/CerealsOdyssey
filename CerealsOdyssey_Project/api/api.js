const apiUrl = '?controller=api&action=get_orders';
let orders = [];

document.getElementById('refreshCereals').addEventListener('click', getOrders);

async function getOrders() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error(`Error en la red: ${response.status} - ${response.statusText}`);
        }
        const data = await response.json();
        orders = data.data || data;
        console.log('Cereales obtenidos:', orders);

        if (orders.length > 0) {
            crearTabla(orders);
        } else {
            console.log('No se encontraron productos.');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

function sortOrders(valueOrder) {
    switch (valueOrder) {
        case 'price':
            orders.sort((a, b) => b.totalPrice - a.totalPrice);
            break;
        case 'order_id':
            orders.sort((a, b) => a.order_id - b.order_id);
            break;
        case 'user_id':
            orders.sort((a, b) => b.user_id - a.user_id);
            break;
        case 'status':
            orders.sort((a, b) => (a.status || '').localeCompare(b.status || ''));
            break;
        case 'date':
            orders.sort((a, b) => new Date(b.date) - new Date(a.date));
            break;
        default:
            break;
    }
    crearTabla(orders);
}

document.querySelector('select[name="sort"]').addEventListener('change', (event) => {
    const valueOrder = event.target.value;
    console.log('Ordenar por:', valueOrder);
    sortOrders(valueOrder); // Llamar a la función de ordenación
});

function crearTabla(orders) {
    console.log('Creando tabla con los productos:', orders);

    const tablaContainer = document.getElementById('tablaContainer');
    tablaContainer.innerHTML = '';

    const tabla = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    const filaEncabezado = document.createElement('tr');
    const encabezados = ['Order_id', 'User_id', 'Date', 'Card Number', 'Status', 'Price', 'Price With Discount', 'Discount Value'];

    encabezados.forEach(texto => {
        const th = document.createElement('th');
        th.textContent = texto;
        filaEncabezado.appendChild(th);
    });
    thead.appendChild(filaEncabezado);

    orders.forEach(order => {
        const tr = document.createElement('tr');

        // order_id
        const tdOrder_id = document.createElement('td');
        tdOrder_id.textContent = order.order_id;
        tr.appendChild(tdOrder_id);

        // user_id
        const tdUser_id = document.createElement('td');
        tdUser_id.textContent = order.user_id;
        tr.appendChild(tdUser_id);

        // Date
        const tdDatet = document.createElement('td');
        tdDatet.textContent = order.date;
        tr.appendChild(tdDatet);

        // Card Number
        const tdCardNumber = document.createElement('td');
        tdCardNumber.textContent = order.cardNumber;
        tr.appendChild(tdCardNumber);

        // Status
        const tdStatus = document.createElement('td');
        tdStatus.textContent = order.status;
        tr.appendChild(tdStatus);

        // Price
        const tdPrice = document.createElement('td');
        tdPrice.textContent = order.totalPrice;
        tr.appendChild(tdPrice);

        // priceDiscount
        const tdPriceDiscount = document.createElement('td');
        tdPriceDiscount.textContent = order.totalDiscount !== null ? order.totalDiscount : 'Null';
        tr.appendChild(tdPriceDiscount);

        // DiscountValue
        const tdDiscountValue = document.createElement('td');
        tdDiscountValue.textContent = order.discount_value !== null ? order.discount_value : 'Null';
        tr.appendChild(tdDiscountValue);

        tbody.appendChild(tr);
    });

    tabla.appendChild(thead);
    tabla.appendChild(tbody);

    tablaContainer.appendChild(tabla);
}
