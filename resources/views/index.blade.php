<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header id="hero">
            <div class="container-fluid">
                <div class="hero-nav row no-gutters">
                    <div class="col-md-8 col-12">
                        <nav class="navbar navbar-expand-md w-100" id="left-nav">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link font-size--rg" href="#">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-size--rg" href="#">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-size--rg" href="#">Menu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-size--rg" href="#">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                    </div>
                    <div class="col-md-4 col-12">
                        <nav id="right-nav" class="navbar navbar-expand text-center text-lg-right">
                            <ul class="navbar-nav mx-auto mr-md-0">
                                <li class="nav-item active">
                                    <a class="nav-link social-icon" href="#">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link social-icon" href="#">
                                        <ion-icon name="logo-instagram"></ion-icon>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link social-icon" href="#">
                                        <ion-icon name="aperture"></ion-icon>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hero-body mt-2 mt-lg-4">
                    <a class="hero-logo d-block text-center">
                        <img src="{{ asset('img/logo.png') }}" alt="" href="/">
                    </a>
                    <div class="hero-title font-family--lora font-size--xl text-center text-color--white mt-2 mt-md-3 mt-lg-4">
                        Pour Taproom
                    </div>
                    <div class="dots-white">
                    </div>
                    <div class="hero-content font-family--lora font-size--rg text-color--white my-2 my-md-3 my-lg-4 px-3 px-lg-0 text-center">
                        Come enjoy a unique experience at our 118 tap self-pour taproom where you can taste from our large wall of taps, featuring a wide selection of curated local and regional craft beers, wines and ciders. No prepaying, just open a tab and you’re good to go.
                    </div>
                    <div class="hero-button my-2 my-md-3 my-lg-4 text-center">
                        <span class="button button--transparent-white">
                            Show Menu
                        </span>
                        <span class="button button--transparent-white">
                            Book Event
                        </span>
                    </div>
                </div>
            </div>
            <a class="hero-scroll text-color--white" href="#about">
                Scroll
                <span class="scroll-line"></span>
            </a>
        </header>
        <section class="section" id="about">
            @include('templates.about')
        </section>
        <section class="section" id="video">

        </section>
        <section class="section" id="menu">
            @include('templates.menu')
        </section>
        <section class="section" id="event">

        </section>
        <section class="section" id="contact">

        </section>
        <footer>

        </footer>
        <script src="{{ asset('js/app.js') }}" async defer></script>
        <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    </body>
</html>
