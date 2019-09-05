<template>
    <slick :options="slickOptions" class="w-100 mt-3 mt-md-4 mt-lg-5">
        <div class="event" v-for="event in events" v-bind:key="event.id">
            <div class="event-image text-center">
                <img v-bind:data-lazy="event.image" v-bind:alt="event.name" class="img-fluid">
                <div class="event-overlay text-center d-flex">
                    <a class="event-button align-self-center" v-bind:href="event.url">Learn More</a>
                    <a class="event-button align-self-center">Share</a>
                </div>
            </div>
            <div class="event-date text-center font-size--md">
                <a v-bind:href="event.url">{{ event.date_time }}</a>
            </div>
            <div class="event-name text-center font-size--rg">
                <a v-bind:href="event.url">{{ event.name }}</a>
            </div>
            <div class="dots-grey"></div>
            <div class="event-decription" v-html="event.description">
            </div>
        </div>
    </slick>
</template>

<script>
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';

export default {
    components: {
        Slick
    },
    props: ['eventData'],
    data() {
        return {
            'events': JSON.parse(this.eventData),
            slickOptions: {
                arrows: false,
                dots: false,
                slidesToScroll: 2,
                slidesToShow: 2,
                lazyLoad: 'ondemand',
                // autoplay: true,
                // autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 767.98,
                        settings: {
                            slidesToScroll: 1,
                            slidesToShow: 1,
                    }
                }
                ]
            },
        };
    },
    methods: {
    },
}
</script>