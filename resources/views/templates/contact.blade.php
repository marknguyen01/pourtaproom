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
            <form method="POST" action="{{ route('contact') }}" class="mt-3 mt-md-4 mt-lg-5">
                <div class="form-row">
                    <div class="form-group col-6">
                        <input type="text" placeholder="First Name" name="first_name" required>
                    </div>
                    <div class="form-group col-6">
                        <input type="text" placeholder="Last Name" name="last_name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <input type="tel" placeholder="Phone Number" name="phone_number" required>
                    </div>
                    <div class="form-group col-6">
                        <input type="email" placeholder="Email Address" name="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <input type="text" placeholder="Company Name (not required)" name="company">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" placeholder="Event Type" name="event" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <input type="datetime-local" placeholder="Date and Time" name="date_time" required>
                    </div>
                    <div class="form-group col-6">
                        <input type="number" placeholder="Estimated number of people" name="num_people" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Catering Needs (not required)" name="catering">
                </div>
                <button type="submit" class="contact-btn button button--transparent-white mt-3">Book an Event</button>
            </form>
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
                            <p>1212 Central Avenue, Charlotte NC 28204</p>
                            <p><a href="tel:(980)-299-8866">(980)-299-8866</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
    </div>
</div>
