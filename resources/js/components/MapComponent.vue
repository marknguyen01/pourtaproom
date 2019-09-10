<template>
    <div class="contact-map map" id="map">
        <div id="popup" class="ol-popup">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-1/2">
                    <div class="text-serif text-xl xl:text-2xl font-bold">
                        Hours of Operation
                    </div>
                    <div class="text-lg lg:mt-4 overflow-hidden">
                        <p>Mon-Thu: 4pm - 11pm</p>
                        <p>Friday: 3pm-12am midnight</p>
                        <p>Sat: 11am - 12am midnight</p>
                        <p>Sun: 12pm - 10pm</p>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 mt-4 lg:mt-0">
                    <div class="text-serif text-xl xl:text-2xl font-bold">
                        Contact Information
                    </div>
                    <div class="text-lg lg:mt-4 overflow-hidden">
                        <p><a v-bind:href="encodedAddress">{{ addressData }}</a></p>
                        <p><a v-bind:href="'tel:' + phoneData">{{ phoneData }}</a></p>
                        <p><a href="mailto:charlotte@pourtaproom.com">charlotte@pourtaproom.com</a></p>
                    </div>
                </div>
                <div class="w-full">
                    <a class="btn btn-black mt-4 text-center"  v-bind:href="encodedAddress">
                        GET DIRECTIONS</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'ol/ol.css';
import Map from 'ol/Map';
import View from 'ol/View';
import Overlay from 'ol/Overlay.js';
import {fromLonLat} from 'ol/proj';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
export default {
    props: ['addressData', 'phoneData'],
    computed: {
        encodedAddress() {
            return 'http://maps.apple.com/?daddr=' +  encodeURI(this.addressData)
        }
    },
    mounted() {
        let layer = new TileLayer();
        const overlay = new Overlay({
            element: document.getElementById('popup'),
            autoPan: true,
        })
        const map = new Map({
            target: 'map',
            controls: [],
            interactions: [],
            layers: [layer],
            overlays: [overlay],
            view: new View({
                center: fromLonLat([-80.817757, 35.220890]),
                zoom: 17
            })
        });
        map.on('postcompose', function() {
            let mapWidth = this.getSize()[0];
            const overlayEl = overlay.getElement();
            overlayEl.style.width = mapWidth - 24 + 'px';
            overlay.setPosition(fromLonLat([-80.817757, 35.220890]));
        });

        window.addEventListener("scroll", function(event) {
            var top = this.scrollY;
            if(top >= map.getTargetElement().getBoundingClientRect().top)
                layer.setSource(new OSM());
        }, false);
    }
}
</script>
