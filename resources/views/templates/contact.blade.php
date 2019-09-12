<div class="flex flex-wrap">
    <div class="w-full lg:w-3/5 bg-black">
        <div class="contact-container container">
            <div class="title-block">
                <div class="title text-white">
                    Event Inquiry Form
                </div>
                <div class="sub-title text-white">
                    Corporate Events, Private Events, Holiday Parties, Birthdays
                </div>
            </div>
            <div class="dots-white"></div>
            <div class="section-content contact-form">
                <contact-form-component route-data="{{ route('contact') }}"></contact-form-component>
            </div>
        </div>
    </div>
    <div class="w-full lg:w-2/5 flex">
        <map-component :address-data="{{ json_encode(setting('contact.address')) }}" :phone-data="{{ json_encode(setting('contact.phone_number')) }}"></map-component>
    </div>
</div>
