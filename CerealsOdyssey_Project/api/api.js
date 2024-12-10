const apiUrl = 'http://localhost/CerealsOdyssey/CerealsOdyssey_Project/api/api.php';

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

getCereals();
