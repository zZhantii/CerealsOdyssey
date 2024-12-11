const apiUrl = '?controller=api&action=test';

//document.getElementById("").addEventListener("change", getOrders());

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
