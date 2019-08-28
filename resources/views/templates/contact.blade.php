<div class="row no-gutters">
    <div class="col-lg-7 contact-bg">
        <div class="contact-form container-fluid section">
            <div class="title-block">
                <div class="title text-color--white font-weight-normal">
                    Make a Reservation
                </div>
                <div class="sub-title text-color--white">
                    Something
                </div>
            </div>
            <div class="dots-white"></div>
            <div id="contact-form">
                <contact-form-component route-data="{{ route('contact') }}"></contact-form-component>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="contact-map map" id="map"></div>
        <div id="popup" class="ol-popup">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-6">
                        <div class="font-family--lora font-size--rg font-weight-bold">
                            Hours of Operation
                        </div>
                        <div class="font-size--sm mt-3">
                            <p>Mon-Thu: 4pm - 11pm</p>
                            <p>Friday: 3pm-12am midnight</p>
                            <p>Sat: 11am - 12am midnight</p>
                            <p>Sun: 12pm - 10pm</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="font-family--lora font-size--rg font-weight-bold">
                            Contact Information
                        </div>
                        <div class="font-size--sm mt-3">
                            <p><a href="http://maps.apple.com/?daddr={{ urlencode(setting('contact.address')) }}">1212 Central Avenue, Charlotte NC 28204</a></p>
                            <p><a href="tel:{{ setting('contact.phone_number') }}">{{ setting('contact.phone_number') }}</a></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="button button--transparent-grey mt-3 text-center" href="http://maps.apple.com/?daddr={{ urlencode(setting('contact.address')) }}">
                            GET DIRECTIONS</a>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
    </div>
</div>
