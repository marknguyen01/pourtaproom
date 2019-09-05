<div class="container-fluid">
    <div class="newsletter-title font-family--lora font-size--md">Subcribe for our newsletter. Keep you updated with upcoming events</div>
    <div class="newsletter-form mt-3 mt-md-4 mt-lg-5">
        <form action="/subcribe" method="POST" class="form-inline">
            @csrf
            <div class="input-group w-100">
                <input type="email" placeholder="Your email address" class="form-control mr-3">
                <span class="input-group-btn">
                    <button type="submit">Subcribe</button>
                </span>
            </div>
        </form>
    </div>
</div>
