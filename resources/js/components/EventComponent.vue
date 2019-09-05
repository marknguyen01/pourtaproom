<template>
    <div class="event-container">
        <slick :options="slickOptions" class="w-100 mt-3 mt-md-4 mt-lg-5">
            <div class="event" v-for="event in events" v-bind:key="event.id">
                <div class="event-image text-center">
                    <img v-bind:data-lazy="event.image" v-bind:alt="event.name" class="img-fluid">
                    <div class="event-overlay text-center d-flex">
                        <a class="event-button align-self-center" v-bind:href="event.url">Learn More</a>
                        <a class="event-button align-self-center" v-on:click="share(event)">Share</a>
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
        <b-modal id="shareModal" ok-only centered hide-header>
            <social-sharing :url="modal.url"
                      :title="modal.title"
                      :description="modal.description"
                      inline-template>
                <div>
                    <network network="email">
                        <ion-icon name="mail"></ion-icon> Email
                    </network>
                    <network network="facebook">
                        <ion-icon name="logo-facebook"></ion-icon> Facebook
                    </network>
                    <network network="twitter">
                        <ion-icon name="logo-twitter"></ion-icon> Twitter
                    </network>
                    <network network="whatsapp">
                        <ion-icon name="logo-whatsapp"></ion-icon> Whatsapp
                    </network>
                </div>
            </social-sharing>
        </b-modal>
    </div>
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
            'modal': {
                'title': null,
                'description': null,
                'url': null,
            }
        };
    },
    methods: {
        share: function(eventData) {
            this.modal.url = eventData.url;
            this.modal.title = eventData.title;
            this.modal.description = eventData.description_text;
            this.$bvModal.show('shareModal');
        }
    },
}
</script>