<header>
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="?controller=categories"><img src="public/img/logo.png" alt="logo" height="60"></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item m-0">
                        <a class="nav-link active" aria-current="page" href="#">Orders</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="WhiteSmoke" rx="1000" ry="1000" />
                                <circle cx="128" cy="128" r="96" fill="WhiteSmoke" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <circle cx="128" cy="120" r="40" fill="WhiteSmoke" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M63.8,199.37a72,72,0,0,1,128.4,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="?controller=user&action=profile">profile</a></li>
                            <li><a class="dropdown-item" href="?controller=user&action=settings">Settings</a></li>
                            <li><a class="dropdown-item" href="?controller=user&action=destroy">Cerrar Sesion</a></li>
                        </ul>
                    </div>
                    <a href="?controller=product&action=getAllProducts" class="btn btn-primary buttonMain">Go to Shop</a>
                </div>
            </div>
        </div>
    </nav>
</header>