const apiUrl = '?controller=api&action=get_products';

document.getElementById('refreshCereals').addEventListener('click', getCereals);

async function getCereals() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error(`Error en la red: ${response.status} - ${response.statusText}`);
        }
        const data = await response.json();  // Si la respuesta es un objeto con propiedad 'data'
        const cereals = data.data || data;  // Si la API devuelve un objeto con 'data', usa ese arreglo
        console.log('Cereales obtenidos:', cereals);

        if (cereals.length > 0) {
            crearTabla(cereals);  // Si hay productos, crear la tabla
        } else {
            console.log('No se encontraron productos.');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

function crearTabla(cereals) {
    console.log('Creando tabla con los productos:', cereals);

    // Limpiar la tabla existente (si la hay)
    const tablaContainer = document.getElementById('tablaContainer');
    tablaContainer.innerHTML = '';

    // Crear la tabla
    const tabla = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    // Crear encabezado de la tabla
    const filaEncabezado = document.createElement('tr');
    const encabezados = ['ID', 'Nombre', 'Precio', 'Imagen', 'Precio Con Descuento'];
    encabezados.forEach(texto => {
        const th = document.createElement('th');
        th.textContent = texto;
        filaEncabezado.appendChild(th);
    });
    thead.appendChild(filaEncabezado);

    // Llenar la tabla con los datos de los cereales
    cereals.forEach(cereal => {
        const tr = document.createElement('tr');

        // ID
        const tdId = document.createElement('td');
        tdId.textContent = cereal.product_id;  // Usamos 'product_id' en lugar de 'id'
        tr.appendChild(tdId);

        // Nombre
        const tdNombre = document.createElement('td');
        tdNombre.textContent = cereal.name;  // Usamos 'name' en lugar de 'nombre'
        tr.appendChild(tdNombre);

        // Precio
        const tdPrecio = document.createElement('td');
        tdPrecio.textContent = cereal.price;  // Usamos 'price'
        tr.appendChild(tdPrecio);

        // Imagen
        const tdImagen = document.createElement('td');
        const img = document.createElement('img');
        img.src = `images/${cereal.image}`;  // Suponiendo que las imágenes están en la carpeta 'images'
        img.alt = cereal.name;  // Usamos 'name' como alt de la imagen
        img.width = 50;  // Ajusta el tamaño de la imagen si es necesario
        tdImagen.appendChild(img);
        tr.appendChild(tdImagen);

        tbody.appendChild(tr);
    });

    // Agregar encabezado y cuerpo a la tabla
    tabla.appendChild(thead);
    tabla.appendChild(tbody);

    // Insertar la tabla en el contenedor
    tablaContainer.appendChild(tabla);
}
