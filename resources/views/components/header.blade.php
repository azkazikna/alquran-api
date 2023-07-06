<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Scheherazade+New&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/27e42df87e.js" crossorigin="anonymous"></script>
    <title>QuranAzka: Baca Al Qur'an mudah dan praktis</title>
    <link rel="shortcut icon" href="/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="/style.css">
    @livewireStyles
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">QuranAzka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                  <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                  <a class="nav-link {{ Request::is('quran') ? 'active' : '' }}" href="/quran">Quran</a>
                  <a class="nav-link {{ Request::is('doa') ? 'active' : '' }}" href="/doa">Doa Harian</a>
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  <button class="pull-xs-right border-0 bg-light" id="navbarSideButton" type="button">
                    <i class="fa-solid fa-gear"></i>
                  </button>
              </div>
            </div>
        </div>
    </nav>

    