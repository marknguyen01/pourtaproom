<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ setting('site.title') }} | Charlotte</title>
        <meta name="description" content="{{ setting('site.description') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body onload="loading()">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="loader" class="fixed w-screen h-screen bg-white z-50 text-center">
            @include('templates.loader')
        </div>
        <div id="app">
            <header id="hero">
                @include('templates.hero')
            </header>
            <div id="body">
                <section class="section" id="about">
                    @include('templates.about')
                </section>
                <section class="section pt-0" id="menu">
                    @include('templates.menu')
                </section>
                @if(isset($events) && $events->isNotEmpty())
                <section class="section" id="event">
                    @include('templates.event')
                </section>
                @endif
                <section class="section" id="newsletter">
                    @include('templates.newsletter')
                </section>
                <section id="contact">
                    @include('templates.contact')
                </section>
            </div>
        </div>
        <footer id="footer">
            @include('templates.footer')
        </footer>
        <script src="{{ asset('js/app.js') }}" async defer></script>
        <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    </body>
</html>
