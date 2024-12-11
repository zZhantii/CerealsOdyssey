// Función para crear la tabla
function crearTabla() {
    const tabla = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    // Crear encabezado
    const filaEncabezado = document.createElement('tr');
    const encabezados = ['ID', 'Nombre', 'Edad'];
    encabezados.forEach(texto => {
        const th = document.createElement('th');
        th.textContent = texto;
        filaEncabezado.appendChild(th);
    });
    thead.appendChild(filaEncabezado);

    // Crear contenido de la tabla
    const datos = [
        [1, 'Juan', 25],
        [2, 'Ana', 30],
        [3, 'Carlos', 22]
    ];

    datos.forEach(fila => {
        const tr = document.createElement('tr');
        fila.forEach(dato => {
            const td = document.createElement('td');
            td.textContent = dato;
            tr.appendChild(td);
        });
        tbody.appendChild(tr);
    });

    // Agregar encabezado y cuerpo a la tabla
    tabla.appendChild(thead);
    tabla.appendChild(tbody);

    // Insertar la tabla en el contenedor
    document.getElementById('tablaContainer').appendChild(tabla);
}

// Evento de carga de página
window.onload = function () {
    crearTabla();
};
