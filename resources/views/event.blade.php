<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ setting('site.title') }} | Charlotte {{ isset($title) ? '|' . $title : '' }}</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
</head>
<body>
    <div id="app">
        <div id="hero" style="background-image:url({{ $event->image }})" class="bg-no-repeat bg-cover bg-center">
            <div class="hero-container flex flex-wrap justify-center h-full">
                <div class="self-center">
                    <div class="hero-count-down text-center w-full text-2xl text-white">
                            <span class="count-down">0 Hours</span>
                            <span class="count-down">0 Hours</span>
                            <span class="count-down">0 Hours</span>
                    </div>
                    <div class="hero-title text-center w-full text-4xl text-white">
                        {{ $event->name }}
                    </div>
                    <div class="hero-button">
                        <div class="btn">Get Ticket</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="event" class="container relative">
            <div class="flex flex-wrap">
                <div class="event-info absolute flex flex-wrap justify-center" class="w:full lg:w-2/3">
                    <div class="event-date info">
                        <div class="font-bold text-2xl">Date</div>
                        <div class="text-lg">{{ $event->date_time }}</div>
                    </div>
                    <div class="event-location info">
                        <div class="font-bold text-2xl">Location</div>
                        <div class="text-lg">{{ $event->date_time }}</div>
                    </div>
                    <div class="info">
                        <div class="font-bold text-2xl">Host</div>
                        <div class="text-lg">{{ $event->date_time }}</div>
                    </div>
                    <div class="info">
                        <div class="font-bold text-2xl">Date</div>
                        <div class="text-lg">{{ $event->date_time }}</div>
                    </div>
                </div>
                <div class="event-description">
                    {!! $event->description !!}
                </div>
                <div class="event-share" class="w:full lg:w-1/3">
                    <a class="mr-4" href="mailto:?subject=${eventData.name}&body=${eventData.description_text}" target="_blank">
                        <ion-icon name="mail" class="align-middle"></ion-icon>Email
                    </a>
                    <a class="mr-4" href="https://www.facebook.com/sharer/sharer.php?u=${eventData.url}&title=${eventData.name}&description=${eventData.description_text}" target="_blank">
                        <ion-icon name="logo-facebook" class="align-middle"></ion-icon>Facebook
                    </a>
                    <a class="mr-4" href="https://twitter.com/intent/tweet?text=${eventData.name}%0A${eventData.url}" target="_blank">
                        <ion-icon name="logo-twitter" class="align-middle"></ion-icon>Twitter
                    </a>
                    <a href="whatsapp://send?text=${eventData.name}%0A${eventData.url}" data-action="share/whatsapp/share">
                        <ion-icon name="logo-whatsapp" class="align-middle"></ion-icon>Whatsapp
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
</body>
</html>
