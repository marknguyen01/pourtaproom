<div class="container-fluid">
    <div class="newsletter-title font-family--lora font-size--md">Subcribe for our newsletter. Keep you updated with upcoming events</div>
    <div class="newsletter-form mt-3 mt-md-4 mt-lg-5">
        <form action="/subcribe" method="POST" class="form-inline">
            @csrf
            <div class="form-row w-100">
                <div class="col-lg-3 col-6">
                    <input type="text" placeholder="First Name" class="form-control">
                </div>
                <div class="col-lg-3 col-6">
                    <input type="text" placeholder="Last Name" class="form-control">
                </div>
                <div class="col-lg-4 mt-3 mt-lg-0">
                    <input type="email" placeholder="Email Address" class="form-control">
                </div>
                <div class="col-lg-2 mt-3 mt-lg-0">
                    <button type="submit">Subcribe</button>
                </div>
            </div>
        </form>
    </div>
</div>
