import { Product } from './model/Product.js';
const apiUrlGet = '?controller=api&action=get_product';
const apiUrlCreate = '?controller=api&action=create_product';
const apiUrlModify = '?controller=api&action=modify_product';
const apiUrlDelete = '?controller=api&action=delete_product';
let products = [];
let product_ID = 0;


document.getElementById('createTable').addEventListener('click', getProduct);

let currentCurrency = 'EUR'; // Inicialmente, la moneda será EUR

// Función para obtener los productos y asignarles la moneda inicial
async function getProduct() {
    try {
        const response = await fetch(apiUrlGet);
        if (!response.ok) {
            throw new Error(`Error en la red: ${response.status} - ${response.statusText}`);
        }
        const data = await response.json();
        products = data.data || data;

        if (products.length > 0) {
            for (let i = 0; i < products.length; i++) {
                products[i].currency = '€';
            }
            crearTabla(products);
        } else {
            document.getElementById('tablaContainer').innerHTML = '<p>No se encontraron productos.</p>';
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

// Función para crear la tabla
function crearTabla(products) {
    const tablaContainer = document.getElementById('tablaContainer');
    tablaContainer.innerHTML = '';

    const tabla = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    const encabezados = ['producto_id', 'name', 'price', 'image', 'priceDiscount'];

    const filaEncabezado = document.createElement('tr');
    encabezados.forEach(encabezado => {
        const th = document.createElement('th');
        th.textContent = encabezado;
        filaEncabezado.appendChild(th);
    });
    thead.appendChild(filaEncabezado);

    products.forEach(product => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${product.product_id}</td>
            <td>${product.name}</td>
            <td>${product.currency || ''} ${product.price.toFixed(2)}</td>
            <td><img src="public/img/products/${product.image}" alt="${product.name}" style="width:100px; height:100px;"></td>
            <td>${product.currency || ''} ${product.priceDiscount}</td>
        `;

        fila.addEventListener('dblclick', () => seleccionarFila(product.product_id, fila));
        tbody.appendChild(fila);
    });

    tabla.appendChild(thead);
    tabla.appendChild(tbody);
    tablaContainer.appendChild(tabla);
}

function seleccionarFila(product_id, fila) {
    document.querySelectorAll('tbody tr').forEach(tr => tr.classList.remove('selected'));
    fila.classList.add('selected');

    product_ID = product_id;
    document.getElementById('ID').innerHTML = '<p>ID</p> ' + product_ID;
    console.log('ID seleccionado:', product_ID);

    const productoSeleccionado = products.find(product => product.product_id === product_id);
    if (productoSeleccionado) {
        document.getElementById('floatingName').value = productoSeleccionado.name || '';
        document.getElementById('floatingPrice').value = productoSeleccionado.price || '';
        document.getElementById('floatingPriceDiscount').value = productoSeleccionado.priceDiscount || '';
        document.getElementById('floatingImage').value = '';
    }
}


document.getElementById('apply-filter').addEventListener('click', () => {
    const filtroID = document.getElementById('filter-product-id').value.toLowerCase();
    const filtroPrice = document.getElementById('filter-price').value.toLowerCase();
    const filtroName = document.getElementById('filter-name').value.toLowerCase();

    const pedidosFiltrados = products.filter(product => {
        const matchID = filtroID ? product.product_id.toString().toLowerCase().includes(filtroID) : true;

        const matchPrice = filtroPrice ? product.price.toString().toLowerCase().includes(filtroPrice) : true;

        const matchName = filtroName ? product.name.toLowerCase().includes(filtroName) : true;

        return matchID && matchPrice && matchName;
    });

    console.log(pedidosFiltrados);
    crearTabla(pedidosFiltrados);
});


document.getElementById('product-by').addEventListener('change', (event) => {
    const criterio = event.target.value;
    products.sort((a, b) => {
        if (criterio === 'price') {
            return b.price - a.price;
        } else if (criterio === 'product_id') {
            return b.product_id - a.product_id;
        } else if (criterio === 'name') {
            return a.name.localeCompare(b.name);
        } else {
            return a[criterio] - b[criterio];
        }
    });
    crearTabla(products);
});

document.getElementById('submitproduct').addEventListener('click', () => {
    const name = document.getElementById('floatingName').value;
    const price = document.getElementById('floatingPrice').value;
    const image = document.getElementById('floatingImage').value;
    const priceDiscount = document.getElementById('floatingPriceDiscount').value;
    const imageFile = document.getElementById('floatingImage').files[0];

    console.log("Valores capturados:", { name, price, image, priceDiscount, imageFile });
    console.log(product_ID);

    if (product_ID == 0) {
        createproduct({ name, price, image, priceDiscount, imageFile })
    } else {
        modifyproduct(product_ID, { name, price, image, priceDiscount, imageFile });
    }
});

// Funcion para hacer Modificar
async function modifyproduct(product_ID, productData) {
    try {
        console.log(`Modificando pedido ID: ${product_ID} con datos:`, productData);

        const requestBody = {
            productID: product_ID,
            name: productData.name,
            price: productData.price,
            image: productData.image,
            priceDiscount: productData.priceDiscount
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

        await getProduct();
    } catch (error) {
        console.error('Error modificando el pedido:', error);
    }
}

// Funcion para crear Pedidos
async function createproduct(productData) {
    console.log('Creando pedido con datos:', productData);

    const requestBody = {
        name: productData.name,
        price: productData.price,
        image: productData.image,
        priceDiscount: productData.priceDiscount
    };

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

    await getProduct();
}

// Funcion para hacer Delete
document.getElementById('Deleteproduct').addEventListener('click', () => {
    const selectedRow = document.querySelector('tr.selected');
    if (!selectedRow) {
        alert('Selecciona un pedido primero.');
        return;
    }
    const product_ID = selectedRow.cells[0].textContent;
    deleteproduct(product_ID);
});

async function deleteproduct(product_ID) {
    console.log(product_ID);
    const response = await fetch(apiUrlDelete, {
        method: 'DELETE',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(product_ID)
    });

    if (!response.ok) {
        console.error('Error en la respuesta del servidor:', response.statusText);
        return;
    }

    const dataPetition = await response.text();
    console.log(dataPetition);

    await getProduct();
}

// Api externa

const currencyApiUrl = 'https://api.freecurrencyapi.com/v1/latest';
const apiKey = 'fca_live_LEjMqqBCL5xCeTCi0TzejSx4xeYWUrrLA0nq1cNW';

// Función para obtener la tasa 
async function obtenerTipoCambio(from, to) {
    try {
        const url = `${currencyApiUrl}?apikey=${apiKey}&base_currency=${from}&currencies=${to}`;
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Error al obtener el tipo de cambio: ${response.status} - ${response.statusText}`);
        }
        const data = await response.json();
        return data.data[to];
    } catch (error) {
        console.error('Error al obtener el tipo de cambio:', error);
        return null;
    }
}

// Función para convertir a dólares
document.getElementById('convertCurrency').addEventListener('click', async () => {
    try {
        if (currentCurrency === 'USD') {
            alert('Los precios ya están en USD.');
            return;
        }

        const tipoCambio = await obtenerTipoCambio('EUR', 'USD');
        if (!tipoCambio) {
            alert('No se pudo obtener el tipo de cambio.');
            return;
        }

        products = products.map(product => {
            product.price = (product.price * tipoCambio).toFixed(2);
            product.priceDiscount = (product.priceDiscount * tipoCambio).toFixed(2);
            product.currency = '$';
            return product;
        });

        currentCurrency = 'USD';
        crearTabla(products);
        alert(`¡Precios convertidos a USD! (Tipo de cambio: 1 EUR = ${tipoCambio} USD)`);
    } catch (error) {
        console.error('Error durante la conversión de moneda:', error);
    }
});

// Función para convertir de vuelta a euros
document.getElementById('convertToEuro').addEventListener('click', async () => {
    try {
        if (currentCurrency === 'EUR') {
            alert('Los precios ya están en EUR.');
            return;
        }

        const tipoCambio = await obtenerTipoCambio('USD', 'EUR');
        if (!tipoCambio) {
            alert('No se pudo obtener el tipo de cambio.');
            return;
        }

        products = products.map(product => {
            product.price = (product.price * tipoCambio).toFixed(2);
            product.priceDiscount = (product.priceDiscount * tipoCambio).toFixed(2);
            product.currency = '€';
            return product;
        });

        currentCurrency = 'EUR';
        crearTabla(products);
        alert(`¡Precios convertidos a EUR! (Tipo de cambio: 1 USD = ${tipoCambio} EUR)`);
    } catch (error) {
        console.error('Error durante la conversión de moneda:', error);
    }
});
