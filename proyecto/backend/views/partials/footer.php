<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= css ?>">
</head>

<body>
    <footer class="footerMain d-flex flex-column align-items-center py-5">
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div class="d-flex flex-column align-items-center">
                        <a href="?controller=product&action=home"><img src="<?= img ?>Logo.png" alt="Logo" height="335px" width="335" class="img-fluid"></a>
                        <h1>Stay Playful</h1>
                    </div>
                    <div class="d-flex align-item-start mt-5">
                        <div class="d-flex flex-column container-fluid ">
                            <img src="<?= img ?>Logo.png" alt="Logo" width="70" height="70" class="img-fluid">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" width="24px" height="24px">
                                    <g id="filled">
                                        <g>
                                            <path d="M17.525,9H14V7c0-1.032,0.084-1.682,1.563-1.682h1.868v-3.18C16.522,2.044,15.608,1.998,14.693,2C11.98,2,10,3.657,10,6.699V9H7v4l3-0.001V22h4v-9.003l3.066-0.001L17.525,9z" />
                                        </g>
                                    </g>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path d="M234.33,69.52a24,24,0,0,0-14.49-16.4C185.56,39.88,131,40,128,40s-57.56-.12-91.84,13.12a24,24,0,0,0-14.49,16.4C19.08,79.5,16,97.74,16,128s3.08,48.5,5.67,58.48a24,24,0,0,0,14.49,16.41C69,215.56,120.4,216,127.34,216h1.32c6.94,0,58.37-.44,91.18-13.11a24,24,0,0,0,14.49-16.41c2.59-10,5.67-28.22,5.67-58.48S236.92,79.5,234.33,69.52Zm-73.74,65-40,28A8,8,0,0,1,108,156V100a8,8,0,0,1,12.59-6.55l40,28a8,8,0,0,1,0,13.1Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path d="M245.66,77.66l-29.9,29.9C209.72,177.58,150.67,232,80,232c-14.52,0-26.49-2.3-35.58-6.84-7.33-3.67-10.33-7.6-11.08-8.72a8,8,0,0,1,3.85-11.93c.26-.1,24.24-9.31,39.47-26.84a110.93,110.93,0,0,1-21.88-24.2c-12.4-18.41-26.28-50.39-22-98.18a8,8,0,0,1,13.65-4.92c.35.35,33.28,33.1,73.54,43.72V88a47.87,47.87,0,0,1,14.36-34.3A46.87,46.87,0,0,1,168.1,40a48.66,48.66,0,0,1,41.47,24H240a8,8,0,0,1,5.66,13.66Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <circle cx="128" cy="128" r="40" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="16" />
                                    <rect x="32" y="32" width="192" height="192" rx="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <circle cx="180" cy="76" r="12" />
                                </svg>
                            </div>
                        </div>
                        <div class="d-flex container-fluid">
                            <ul>
                                <li>About us</li>
                                <li>Contact Us</li>
                                <li>FAQS</li>
                                <li>Order status</li>
                                <li>Orders & Returns</li>
                                <li>Shipping information</li>
                                <li>Promotion terms and conditions</li>
                            </ul>
                        </div>
                        <div class="d-flex flex-column container-fluid gap-3">
                            <h2>Odyssey in your inbox</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit doloremque praesentium fugit minus illo. Corporis maxime minima consequuntur qui ipsa consectetur laboriosam ea, aspernatur reiciendis reprehenderit, iusto quasi repellat minus.</p>
                            <a href="?controller=product&action=shop" class="btn btn-primary buttonMain2">Shop Celebrations</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-space-between">
                    <p>© 2024 Mondelez International Group. All Rights reserved.</p>
                    <div class="footer-links">
                        <a href="#">Terms and Conditions</a>
                        <span>•</span>
                        <a href="#">Privacy Policy</a>
                        <span>•</span>
                        <a href="#">Cookie Policy</a>
                        <span>•</span>
                        <a href="#">Accessibility</a>
                        <span>•</span>
                        <a href="#">Do not sell or share my personal information</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>