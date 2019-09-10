<div class="container">
    <div class="title-block">
        <div class="newsletter-title sub-title text-white">Subcribe for our newsletter. Keep you updated with upcoming events</div>
    </div>
    <div class="newsletter-form mt-6 2xl:mt-8">
        <form action="/subcribe" method="POST" class="form-inline">
            @csrf
            <div class="flex flex-wrap lg:-mx-4">
                <div class="w-full lg:w-1/6 lg:px-4">
                    <input type="text" placeholder="First Name" class="form-control">
                </div>
                <div class="w-full lg:w-1/6 mt-3 lg:mt-0 lg:px-4">
                    <input type="text" placeholder="Last Name" class="form-control">
                </div>
                <div class="w-full lg:w-3/6 mt-3 lg:mt-0 lg:px-4">
                    <input type="email" placeholder="Email Address" class="form-control">
                </div>
                <div class="w-full lg:w-1/6 mt-3 lg:mt-0 lg:px-4">
                    <button type="submit">Subcribe</button>
                </div>
            </div>
        </form>
    </div>
</div>
