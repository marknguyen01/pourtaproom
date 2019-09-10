<template>
    <div class="event-container section-content">
        <slick :options="slickOptions" class="w-full">
            <div class="event" v-for="event in events" v-bind:key="event.id">
                <div class="event-image text-center">
                    <img v-bind:data-lazy="event.image" v-bind:alt="event.name" class="img-fluid">
                    <div class="event-overlay text-center flex justify-center">
                        <a class="event-button" v-bind:href="event.url">Learn More</a>
                        <a class="event-button" v-on:click="share(event)">Share</a>
                    </div>
                </div>
                <div class="event-date text-center">
                    <a v-bind:href="event.url">{{ event.date_time }}</a>
                </div>
                <div class="event-name text-center font-size--rg">
                    <a v-bind:href="event.url">{{ event.name }}</a>
                </div>
                <div class="dots-grey"></div>
                <div class="event-description" v-html="event.description">
                </div>
            </div>
        </slick>
    </div>
</template>

<script>
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';

export default {
    components: {
        Slick,
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
            'modal': {
                'title': null,
                'description': null,
                'url': null,
            }
        };
    },
    methods: {
        share: function(eventData) {
            this.$swal.fire({
                title: 'Share this event',
                html: `
                    <a class="mr-4" href="mailto:?subject=${eventData.name}&body=${eventData.description_text}" target="_blank">
                        <ion-icon name="mail" class="align-middle"></ion-icon>Email
                    </a>
                    <a class="mr-4" href="https://www.facebook.com/sharer/sharer.php?u=${eventData.url}&title=${eventData.name}&description=${eventData.description_text}" target="_blank">
                        <ion-icon name="logo-facebook" class="align-middle"></ion-icon>Facebook
                    </a>
                    <a class="mr-4" href="https://twitter.com/intent/tweet?text=${eventData.name}%0A${eventData.url}" target="_blank">
                        <ion-icon name="logo-twitter" class="align-middle"></ion-icon>Twitter
                    </a>
                    <a href="whatsapp://send?text=${eventData.name}%0A${eventData.url}" data-action="share/whatsapp/share">
                        <ion-icon name="logo-whatsapp" class="align-middle"></ion-icon>Whatsapp
                    </a>
                `,
                type: 'info'
            });
        }
    },
}
</script>
