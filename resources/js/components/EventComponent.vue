<template>
    <div class="event-container section-content">
        <slick :options="slickOptions" class="w-full">
            <div class="event" v-for="event in events" v-bind:key="event.id">
                <div class="event-image text-center">
                    <img v-bind:data-lazy="event.image" v-bind:alt="event.name" class="img-fluid">
                    <a class="event-share-button" v-on:click="share(event)"><ion-icon name="share"></ion-icon></a>
                    <div class="event-info">
                        <div class="event-name text-center text-xl xl:text-2xl">
                            <a v-bind:href="event.url">{{ event.name }}</a>
                        </div>
                        <div class="event-date text-center text-lg xl:text-3xl">
                            <a v-bind:href="event.url">{{ event.date_time }}</a>
                        </div>
                    </div>
                </div>
                <div class="dots-grey"></div>
                <div class="event-description text-lg mt-2 lg:mt-4 xl:text-xl" v-html="event.description">
                </div>
            </div>
        </slick>
        <div class="slider-button-container mt-4">
        </div>
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
                appendArrows: '.slider-button-container',
                prevArrow: '<button type="button" class="slick-prev mr-2"><ion-icon name="arrow-round-back"></ion-icon></button>',
                nextArrow: '<button type="button" class="slick-next ml-2"><ion-icon name="arrow-round-forward"></ion-icon></button>',
                dots: false,
                slidesToScroll: 2,
                slidesToShow: 2,
                lazyLoad: 'progressive',
                autoplaySpeed: 3500,

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
                title: `Share ${eventData.name}`,
                html: `
                    <a class="mr-4 swal-share" href="mailto:?subject=${eventData.name}&body=${eventData.description_text}" target="_blank">
                        <ion-icon name="mail"></ion-icon>Email
                    </a>
                    <a class="mr-4 swal-share" href="https://www.facebook.com/sharer/sharer.php?u=${eventData.url}&title=${eventData.name}&description=${eventData.description_text}" target="_blank">
                        <ion-icon name="logo-facebook"></ion-icon>Facebook
                    </a>
                    <a class="mr-4 swal-share" href="https://twitter.com/intent/tweet?text=${eventData.name}%0A${eventData.url}" target="_blank">
                        <ion-icon name="logo-twitter"></ion-icon>Twitter
                    </a>
                    <a class="swal-share" href="whatsapp://send?text=${eventData.name}%0A${eventData.url}" data-action="share/whatsapp/share">
                        <ion-icon name="logo-whatsapp"></ion-icon>Whatsapp
                    </a>
                `,
                type: 'info'
            });
        }
    },
}
</script>
