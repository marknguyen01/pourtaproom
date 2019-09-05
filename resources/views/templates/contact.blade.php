<div class="row no-gutters">
    <div class="col-lg-7 contact-bg">
        <div class="contact-form container-fluid section">
            <div class="title-block">
                <div class="title text-color--white font-weight-normal">
                    Event Inquiry Form
                </div>
                <div class="sub-title text-color--white">
                    Corporate Events, Private Events, Holiday Parties, Birthdays
                </div>
            </div>
            <div class="dots-white"></div>
            <div id="contact-form">
                <contact-form-component route-data="{{ route('contact') }}"></contact-form-component>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <map-component :address-data="{{ json_encode(setting('contact.address')) }}" :phone-data="{{ json_encode(setting('contact.phone_number')) }}"></map-component>
    </div>
</div>
