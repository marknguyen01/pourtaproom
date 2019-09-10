{{-- <div class="box">
    <div class="beer">
        <div class="cup">
            <div class="liquid"></div>
            <div class="stripe stripe-1"></div>
            <div class="stripe stripe-2"></div>
            <div class="stripe stripe-3"></div>
        </div>
        <div class="cup-holder"></div>
        <div class="foam-container">
            <div class="foam foam-1"></div>
            <div class="foam foam-2"></div>
            <div class="foam foam-3"></div>
        </div>
        <div class="bubble bubble-1"></div>
        <div class="bubble bubble-2"></div>
        <div class="bubble bubble-3"></div>
    </div>
    <div class="loader-title">{{ setting('site.title') }}</div>
</div> --}}
<div class="loader-container flex justify-center h-screen">
    <div class="self-center logo">
        <img class="inline-block" src="{{ App::environment('local') ? asset('img/logo.png') : asset('storage/' . setting('site.logo')) }}" alt="{{ setting('site.title') }}">
        <div class="loader-text text-2xl mt-4">Please wait! Loading...</div>
    </div>
</div>
