<div class="container-fluid">
    <div class="newsletter-title">Subcribe for our newsletter. Keep you updated with upcoming events</div>
    <div class="newsletter-form">
        <form action="/subcribe" method="POST" class="">
            @csrf
            <input type="email" placeholder="Your email address">
            <button type="submit">SUBSCRIBE</button>
    </div>
</div>
