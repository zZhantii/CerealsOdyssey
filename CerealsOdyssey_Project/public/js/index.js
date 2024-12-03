// Errors User 401
document.addEventListener('DOMContentLoaded', function () {
    const toastLiveExample = document.getElementById('liveToast');

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error') && urlParams.get('error') == 401) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
    }
});

// Cart



