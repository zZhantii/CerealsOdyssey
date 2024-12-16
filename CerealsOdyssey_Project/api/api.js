const apiUrl = '?controller=api&action=get_products';

document.getElementById('refreshCereals').addEventListener('click', getCereals);

async function getCereals() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error(`Error en la red: ${response.status} - ${response.statusText}`);
        }
        const data = await response.json();
        const cereals = data.data || data;
        console.log('Cereales obtenidos:', cereals);

        if (cereals.length > 0) {
            crearTabla(cereals);
        } else {
            console.log('No se encontraron productos.');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

function crearTabla(cereals) {
    console.log('Creando tabla con los productos:', cereals);

    const tablaContainer = document.getElementById('tablaContainer');
    tablaContainer.innerHTML = '';

    const tabla = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    const filaEncabezado = document.createElement('tr');
    const encabezados = ['Product_ID', 'Categorie_ID', 'Name', 'Price', 'Image', 'Price With Discount'];
    encabezados.forEach(texto => {
        const th = document.createElement('th');
        th.textContent = texto;
        filaEncabezado.appendChild(th);
    });
    thead.appendChild(filaEncabezado);

    cereals.forEach(cereal => {
        const tr = document.createElement('tr');

        // ID
        const tdId = document.createElement('td');
        tdId.textContent = cereal.product_id;
        tr.appendChild(tdId);

        // Categoria
        const tdCategoria_id = document.createElement('td');
        tdCategoria_id.textContent = cereal.categorie_id;
        tr.appendChild(tdCategoria_id);

        // Nombre
        const tdNombre = document.createElement('td');
        tdNombre.textContent = cereal.name;
        tr.appendChild(tdNombre);

        // Precio
        const tdPrecio = document.createElement('td');
        tdPrecio.textContent = cereal.price;
        tr.appendChild(tdPrecio);

        // Imagen
        const tdImagen = document.createElement('td');
        const img = document.createElement('img');
        img.src = `public/img/products/${cereal.image}`;
        img.alt = cereal.name;
        img.width = 50;
        tdImagen.appendChild(img);
        tr.appendChild(tdImagen);

        // priceDiscount
        const tdPriceDiscount = document.createElement('td');
        tdPriceDiscount.textContent = cereal.priceDiscount !== null ? cereal.priceDiscount : 'Sin descuento';
        tr.appendChild(tdPriceDiscount);

        tbody.appendChild(tr);
    });

    tabla.appendChild(thead);
    tabla.appendChild(tbody);

    tablaContainer.appendChild(tabla);
}
