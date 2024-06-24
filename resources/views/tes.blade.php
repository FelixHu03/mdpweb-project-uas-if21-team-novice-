<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Hotel LIOX </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/home.css') }}">
</head>
<body class="bg-secondary">
    <div class="nav1">  
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="tes">LIOX Hotel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tes">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Tentang Kami
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Visi</a></li>
                          <li><a class="dropdown-item" href="#">Misi</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Instagram</a></li>
                          <li><a class="dropdown-item" href="#">Facebook</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Layanan Kami
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Pelayanan</a></li>
                          <li><a class="dropdown-item" href="#">Spa</a></li>
                          <li><a class="dropdown-item" href="#">Room Service</a></li>
                          <li><a class="dropdown-item" href="#">Airport Shuttle</a></li>
                          <li><a class="dropdown-item" href="#">Laundry</a></li>
                          <li><a class="dropdown-item" href="#">Car Rental</a></li>
                          <li><a class="dropdown-item" href="#">Tour Package</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    </ul>
                    <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        {{-- bagian isi judul --}}
        <div class="container m-lg">
            <p class="text-center">Hotel & Resort</p>
            <h1 class="text-center">Welcome to LIOX</h1>
            <button class="m-l button-t"> <a href="#"></a>Book Now</button>
        </div>
    </div>
    <div class="container"> 
        <div class="container">
            <h1><?= "Berikut Halaman Dashboard ";?></h1>
            {{-- bisa dtambah apa saja  --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>