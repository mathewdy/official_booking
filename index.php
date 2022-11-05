<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Document</title>
</head>
<style>
    button.button{
        border-radius: 50%;
    }
</style>
<body>
<div class="container-fluid p-0 m-0">
<nav class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container-xxl container-lg">
        <a class="navbar-brand" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" style="transform:rotate(50deg);" fill="currentColor" class="bi bi-airplane-fill" viewBox="0 0 20 16">
            <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Z"/>
            </svg>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-lg-5">
                    <a class="nav-link active" aria-current="page" href="#">Manage</a>
                </li>
                <li class="nav-item  mx-lg-5">
                    <a class="nav-link" href="#">Travel Info</a>
                </li>
                <li class="nav-item mx-lg-5">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg> Log in</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div id="carouselExampleIndicators" class="carousel slide my-0 py-0" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" style="border-radius: 50%; width:15px; height: 13px; outline:none; border: none; background: black;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" style="border-radius: 50%; width:15px; height: 13px; outline:none; border: none; background: black;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" style="border-radius: 50%; width:15px; height: 13px; outline:none; border: none; background: black;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" style="border-radius: 50%; width:15px; height: 13px; outline:none; border: none; background: black;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" class="max-height: 100vh;">
            <div class="carousel-item active">
                <img src="src/img/bg.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="position: absolute; top: 50%; transform: translateY(-35%)">
                    <p class="display-1 text-dark">Cagayan De Oro</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam in suscipit nam porro quisquam sed!.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="src/img/boracay.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="position: absolute; top: 50%; transform: translateY(-50%)">
                    <p class="display-1">Boracay</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam in suscipit nam porro quisquam sed!.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="src/img/siargaoooo.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="position: absolute; top: 50%; transform: translateY(-60%)">
                    <p class="display-1 text-dark">Siargao</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam in suscipit nam porro quisquam sed!.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="src/img/palawan.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="position: absolute; top: 50%; transform: translateY(-50%)">
                    <p class="display-1">Palawan</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam in suscipit nam porro quisquam sed!.</p>
                </div>
            </div>
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
    </div>
</div>
<main class="p-5 text-center" style="background:#F5F5F5;">
    <span class="text-center">
        <p class="h3 lead" style="font-weight: 600;">Promo Flights</p>
    </span>
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-4 ">
                <p class="h4">Manila</p>
                <div class="row p-5">
                    <div class="col-lg-12 mb-3">
                        <img src="src/img/boracay.jpg" class="w-100" height="200"alt="">
                    </div>
                    <div class="col-lg-12">
                        <img src="src/img/boracay.jpg" class="w-100" height="200" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <p class="h4">Cebu</p>
                <div class="row p-5">
                    <div class="col-lg-12 mb-3">
                        <img src="src/img/palawan.jpg" class="w-100" height="200" alt="">
                    </div>
                    <div class="col-lg-12">
                        <img src="src/img/palawan.jpg" class="w-100" height="200" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <p class="h4">Davao</p>
                <div class="row p-5">
                    <div class="col-lg-12 mb-3">
                        <img src="src/img/siargaoooo.jpg" class="w-100" height="200" alt="">
                    </div>
                    <div class="col-lg-12">
                        <img src="src/img/siargaoooo.jpg" class="w-100" height="200" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container py-5">
        <p class="h4 text-start">Travel Guide</p>
        <div class="row d-flex justify-content-evenly align-items-center">
            <div class="col-lg-4">       
                <div class="card w-75">
                    <img src="src/img/boracay.jpg" alt="" class="card-img-top w-100" style="height: 60vh;">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="src/img/boracay.jpg" alt="" class="card-img-top w-100" style="height: 80vh;">
                </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-end">
                <div class="card w-75">
                    <img src="src/img/boracay.jpg" alt="" class="card-img-top w-100" style="height: 60vh;">
                </div>
            </div>
        </div>
    </div>
</main>
<div class="bg-dark-accent footer p-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-6">
                <p class="h4 fw-light" style="color: var(--info-dark);">Connect With Us!</p>
                <span class="d-flex flex-row align-items-center mb-3">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"  fill="#ccc" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg> 
                    </span>
                    <span>
                        <p class="text-white p-0 m-0 px-2">Facebook.com/Packengotravels</p>
                    </span>
                </span>
                <span class="d-flex flex-row align-items-center mb-3">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ccc" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                    </span>
                    <span>
                        <p class="text-white p-0 m-0 px-2">Baesa, Quezon City, Philippines</p>
                    </span>
                </span>
                <span class="d-flex flex-row align-items-center mb-3">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ccc" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                    </span>
                    <span>
                        <p class="text-white p-0 m-0 px-2">09701102521</p>
                    </span>
                </span>
                <span class="d-flex flex-row align-items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ccc" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                        </svg>
                    </span>
                    <span>
                        <p class="text-white p-0 m-0 px-2">packengoo@gmail.com</p>
                    </span>
                </span>
            </div>
            <div class="col-lg-6 text-end">
                <p class="h1" style="font-weight:200; color: var(--info-dark);">Travel with comfort?</p>
                <p class="h3" style="font-weight:200; color: #ccc;">We are here to serve you with everything you need!</p>
            </div>
        </div>
    </div>
</div>
<script src="src/styles/bs-5/@popperjs/core/dist/umd/popper.js"></script>
<script src="src/styles/bs-5/bootstrap/dist/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
</html>