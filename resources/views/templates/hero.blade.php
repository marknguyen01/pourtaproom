<div class="overlay-nav block lg:hidden">
    <div class="overlay-nav-container">
        @include('templates.nav_items')
    </div>
</div>

<div class="hero-container">
    <nav class="hero-navbar">
        <div class="block lg:hidden fixed lg:relative z-30">
          <button class="flex items-center px-3 py-2 border rounded text-white bg-black" onclick="toggleNav()">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
          </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="lg:flex-grow lg:inline-block hidden">
                @include('templates.nav_items')
            </div>
            <div class="flex justify-center lg:justify-end w-100 lg:w-auto">
                <a class="social-icon mr-8" href="{{ setting('contact.facebook') }}">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a class="social-icon mr-8" href="{{ setting('contact.instagram') }}">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a class="social-icon" href="{{ setting('contact.loyalzoo') }} ">
                    <img src="{{ asset('img/loyalzoo.png') }}">
                </a>
            </div>
        </div>
    </nav>
    <div class="w-100 mt-4 lg:mt-16 flex justify-center">
        <div class="hero-body w-screen">
                <a class="hero-logo logo" href="/">
                    <img src="{{ App::environment('local') ? asset('img/logo.png') : asset('storage/' . setting('site.logo')) }}" alt="{{ setting('site.title') }}">
                </a>
                <div class="hero-title text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl mt-0 lg:mt-8">
                    {{ setting('site.title') }}
                </div>
                <div class="dots-white">
                </div>
                <div class="hero-content text-xl lg:text-2xl mt-0 lg:mt-8">
                    {!! setting('site.description') !!}
                </div>
                <div class="hero-button mt-4 lg:mt-8 flex flex-wrap">
                    <div class="w-full md:w-1/2 text-center md:text-right">
                        <a class="btn btn-white md:mr-2" href="/#menu">
                            Show Menu
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 mt-4 text-center md:mt-0 md:text-left">
                        <a class="btn btn-white md:ml-2" href="/#contact">
                            Book Event
                        </a>
                    </div>
                </div>
            </div>
    </div>
</div>
<a class="hero-scroll block md:hidden xl:block" href="#about">
    Scroll
    <span class="scroll-line"></span>
</a>
