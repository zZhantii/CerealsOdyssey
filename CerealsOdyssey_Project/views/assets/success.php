<?php
if (isset($_GET['success'])) {
    $success = $_GET['success'];
    if ($success == 200) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="success" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Success: Profile Create.
                </div>
            </div>
        </div>
    <?php } elseif ($success == 1) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="success" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Success: Name and Last Name Update.
                </div>
            </div>
        </div>
    <?php } elseif ($success == 2) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="success" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Success: Address Removed.
                </div>
            </div>
        </div>
    <?php } elseif ($success == 3) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="success" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Success: Address Added.
                </div>
            </div>
        </div>
    <?php } elseif ($success == 4) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="success" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Success: Address updated.
                </div>
            </div>
        </div>
    <?php } elseif ($success == 5) { ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="success" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?= url_base ?>public/img/logo.png" class="rounded me-2" height="30" alt="logo">
                    <strong class="me-auto">Cereals Odyssey</strong>
                    <small>1 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Success: Order Create.
                </div>
            </div>
        </div>
<?php }
}
?>