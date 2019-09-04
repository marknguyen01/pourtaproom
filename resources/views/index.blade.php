<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ setting('site.title') }} | Charlotte</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header id="hero">
            <div class="container-fluid">
                <div class="hero-nav row no-gutters">
                    <div class="col-lg-8 col-12">
                        <nav class="navbar navbar-expand-lg w-100" id="left-nav">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link font-size--rg" href="#hero">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-size--rg" href="#about">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-size--rg" href="#menu">Menu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link font-size--rg" href="#contact">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                    </div>
                    <div class="col-lg-4 col-12">
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
                                        <img src="{{ asset('img/loyalzoo.png') }}" style="vertical-align: top">
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hero-body w-100 mt-1">
                    <a class="hero-logo d-block text-center">
                        <img src="{{ App::environment('local') ? asset('img/logo.png') : asset('storage/' . setting('site.logo')) }}" alt="" href="/">
                    </a>
                    <div class="hero-title font-family--lora font-size--xl text-center text-color--white my-2 my-md-3 my-lg-4">
                        {{ setting('site.title') }}
                    </div>
                    <div class="dots-white">
                    </div>
                    <div class="hero-content font-family--lora font-size--rg text-color--white my-2 my-md-3 my-lg-4 px-3 px-lg-0 text-center">
                        {!! setting('site.description') !!}
                    </div>
                    <div class="hero-button text-center">
                        <a class="button button--transparent-white font-size--rg" href="/#menu">
                            Show Menu
                        </a>
                        <a class="button button--transparent-white font-size--rg" href="/#contact">
                            Book Event
                        </a>
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
        <section class="section p-0" id="video">
            @include('templates.video')
        </section>
        <section class="section" id="menu">
            @include('templates.menu')
        </section>
        @if(isset($events) && $events->isNotEmpty())
        <section class="section" id="event">
            @include('templates.event')
        </section>
        @endif
        <section id="contact">
            @include('templates.contact')
        </section>
        <footer>
        </footer>
        <script src="{{ asset('js/app.js') }}" async defer></script>
        <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    </body>
</html>
