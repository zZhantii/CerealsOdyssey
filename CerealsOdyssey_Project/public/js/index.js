// Errors User 401
document.addEventListener('DOMContentLoaded', function () {
    const toastLiveExample = document.getElementById('liveToast');

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error') && (urlParams.get('error') == 401 || urlParams.get('error') == 4013)) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
    }
});

// Cart 
document.getElementById('openOffcanvas').addEventListener('click', function () {
    // Abre el offcanvas
    var offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasRight'));
    offcanvas.show();

    // Redirige después de un pequeño retraso para permitir que el offcanvas se muestre
    setTimeout(function () {
        window.location.href = '?controller=cart&action=cart2';
    }, 300); // Ajusta el tiempo según sea necesario
});




