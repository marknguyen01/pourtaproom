/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import Vue from 'vue'
import VueLayers from 'vuelayers'
import SocialSharing from 'vue-social-sharing'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('menu-component', require('./components/MenuComponent.vue').default);
Vue.component('contact-form-component', require('./components/ContactFormComponent.vue').default);
Vue.component('map-component', require('./components/MapComponent.vue').default);
Vue.component('event-component', require('./components/EventComponent.vue').default);

Vue.use(VueLayers, {
    dataProjection: 'EPSG:4326',
});
Vue.use(SocialSharing);
Vue.use(VueSweetalert2, {
    confirmButtonColor: '#2C2C2C'
});

const app = new Vue({
    el: '#app',
});

window.addEventListener('ready', () => {
    screen.orientation.lock('portrait').then(() => {
        fullscreen.exit();
    }).catch((err) => {
        console.log(err);
    })
});

window.loading = function() {
    let el = document.getElementById('loader');
    el.classList.add('fadeout');
    if(!window.location.hash) window.scrollTo(0, 0);
    setTimeout(function() {
        el.parentNode.removeChild(el);
    }, 1000);
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
};

window.addEventListener('resize', () => {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});
