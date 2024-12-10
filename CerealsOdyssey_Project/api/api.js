const apiUrl = 'http://localhost/CerealsOdyssey_Project/api/api.php';

// Función para obtener los cereales
async function getCereals() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error('Error en la red');
        }
        const cereals = await response.json();
        console.log(cereals);
    } catch (error) {
        console.error('Error:', error);
    }
}

// Llamar a la función para obtener los cereales
getCereals();

// Función para crear un nuevo cereal
async function createCereal(name, brand) {
    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name, brand })
        });
        if (!response.ok) {
            throw new Error('Error al crear el cereal');
        }
        const result = await response.json();
        console.log('Cereal creado:', result);
    } catch (error) {
        console.error('Error:', error);
    }
}

// Función para actualizar un cereal
async function updateCereal(id, name, brand) {
    try {
        const response = await fetch(`${apiUrl}?id=${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name, brand })
        });
        if (!response.ok) {
            throw new Error('Error al actualizar el cereal');
        }
        const result = await response.json();
        console.log('Cereal actualizado:', result);
    } catch (error) {
        console.error('Error:', error);
    }
}

// Función para eliminar un cereal
async function deleteCereal(id) {
    try {
        const response = await fetch(`${apiUrl}?id=${id}`, {
            method: 'DELETE'
        });
        if (!response.ok) {
            throw new Error('Error al eliminar el cereal');
        }
        const result = await response.json();
        console.log('Cereal eliminado:', result);
    } catch (error) {
        console.error('Error:', error);
    }
}

// Manejar el envío de formularios
document.getElementById('createCerealForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const name = document.getElementById('newCerealName').value;
    const brand = document.getElementById('newCerealBrand').value;
    createCereal(name, brand);
});

document.getElementById('updateCerealForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const id = document.getElementById('updateCerealId').value;
    const name = document.getElementById('updateCerealName').value;
    const brand = document.getElementById('updateCerealBrand').value;
});