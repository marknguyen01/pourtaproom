/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import BootstrapVue from 'bootstrap-vue';
import VueLazyload from 'vue-lazyload';


window.Vue = require('vue');

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

Vue.use(BootstrapVue);

Vue.use(VueLazyload, {
  preLoad: 1.3,
  attempt: 1
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const menuApp = new Vue({
    el: '#menu',
});

const contactApp = new Vue({
    el: '#contact-form',
})

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
    setTimeout(function() {
        el.parentNode.removeChild(el)
    }, 1000);
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
};

window.addEventListener('resize', () => {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  });
