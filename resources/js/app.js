/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import "babel-polyfill";
import 'whatwg-fetch';

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('prop-component', require('./components/PropComponent.vue').default);
Vue.component('ajax-component', require('./components/AjaxComponent.vue').default);
Vue.component('chartline-component', require('./components/ChartlineComponent').default);
Vue.component('chartpie-component', require('./components/ChartpieComponent').default);
Vue.component('chartrandom-component', require('./components/ChartrandomComponent').default);
Vue.component('socket-component', require('./components/SocketComponent').default);
Vue.component('socket-chat', require('./components/SocketchatComponent').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



window.addEventListener('load', function () {
    const app = new Vue({
        el: '#app',
    });
})
