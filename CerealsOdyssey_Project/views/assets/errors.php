<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 401) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Error: Username invalid.
                </div>
            </div>
        </div>
    <?php } elseif ($error == 402) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Error: Password invalid.
                </div>
            </div>
        </div>
    <?php } elseif ($error == 403) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Error: Email already exist.
                </div>
            </div>
        </div>
    <?php } elseif ($error == 404) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Error: Passwords do not match.
                </div>
            </div>
        </div>
    <?php } elseif ($error == 10) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Error: You must choose a product.
                </div>
            </div>
        </div>
<?php }
}
?>