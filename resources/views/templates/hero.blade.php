<div class="container p-4">
    <div class="flex">
        <div class="w-1/2">
            <nav class="flex items-center justify-between flex-wrap">
                <div class="block lg:hidden">
                    <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                    <div class="text-sm lg:flex-grow">
                    <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red mr-4">
                        Docs
                    </a>
                    <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red mr-4">
                        Examples
                    </a>
                    <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red">
                        Blog
                    </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

{{-- <div class="container-fluid">
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
                        <a class="nav-link social-icon" href="{{ setting('contact.facebook') }}">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link social-icon" href="{{ setting('contact.instagram') }}">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link social-icon" href="{{ setting('contact.loyalzoo') }} ">
                            <img src="{{ asset('img/loyalzoo.png') }}" style="vertical-align: top">
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="hero-body w-100 mt-1">
        <a class="hero-logo d-block text-center" href="/">
            <img src="{{ App::environment('local') ? asset('img/logo.png') : asset('storage/' . setting('site.logo')) }}" alt="{{ setting('site.title') }}">
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
</a> --}}
