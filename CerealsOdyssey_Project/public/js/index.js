// Errors User 401
document.addEventListener('DOMContentLoaded', function () {
    const toastLiveExample = document.getElementById('liveToast');

    const urlParams = new URLSearchParams(window.location.search);
    const errorCodes = [401, 402, 403, 404];

    if (urlParams.has('error')) {
        const errorParam = parseInt(urlParams.get('error'), 10);
        if (errorCodes.includes(errorParam)) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
        }
    }

    const successCodes = [1, 2, 3, 4, 5, 200];
    if (urlParams.has('success')) {
        const successParam = parseInt(urlParams.get('success'), 10);
        if (successCodes.includes(successParam)) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
            toastBootstrap.show();
        }
    }
});


// Cart

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();

        const url = this.getAttribute('href');

        fetch(url)
            .then(response => response.text())
            .then(data => {
                console.log(data);

                if (data.includes("Producto añadido correctamente")) {

                    const offcanvasElement = document.querySelector('#offcanvasRight');
                    const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
                    offcanvas.show();

                } else {
                    console.error("Error:", data);
                }
            })
            .catch(error => console.error('Error al realizar la solicitud:', error));
    });
});



// CheckBox Shop

function filterURL() {
    const checkboxes = document.querySelectorAll('.squareCheckBox');
    const selectedValues = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);

    // Construir nueva URL
    const baseURL = "?controller=product&action=getAllProducts";
    const filterParam = selectedValues.length > 0 ? "&id=" + selectedValues.join(",") : "";
    const newURL = baseURL + filterParam;

    // Redirigir a la nueva URL
    window.location.href = newURL;
}





