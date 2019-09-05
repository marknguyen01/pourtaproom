<div class="container-fluid">
    <div class="title-block">
        <div class="title">
            Upcoming Events
        </div>
        <div class="sub-title">
            A Beer & Wine Festival Every Day Of the Week
        </div>
    </div>
    <div class="row mt-3 mt-md-4 mt-lg-5">
        @foreach($events as $event)
            <div class="col-lg-4 col-md-6">
                <div class="event">
                    <div class="event-image text-center">
                        <img src="{{ Voyager::image(json_decode($event->thumbnail('cropped'))[0]) }}" alt="{{ $event->name }}" class="img-fluid">
                        <div class="event-overlay text-center d-flex">
                            <a class="event-button align-self-center" href="{{ route('event', $event->slug) }}">Learn More</a>
                            <a class="event-button align-self-center">Share</a>
                        </div>
                    </div>
                    <div class="event-name text-center font-size--rg">
                        <a href="{{ route('event', $event->slug) }}">{{ $event->name }}</a>
                    </div>
                    <div class="event-date text-center font-size--md">
                        <a href="{{ route('event', $event->slug) }}">{{ (new DateTime($event->date_time))->format('F dS, Y \a\t h:i A') }}</a>

                    </div>
                    <div class="dots-grey"></div>
                    <div class="event-decription text-center">
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

