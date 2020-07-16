/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

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


// Navbar
Vue.component('sidebar', require('./components/menus/SideBar.vue').default);
Vue.component('topbar', require('./components//menus/TopBar.vue').default);


//Auth
Vue.component('register', require('./components//auth/Register.vue').default);
Vue.component('login', require('./components//auth/login.vue').default);


Vue.component('products', require('./components/ProductsComponent.vue').default);
Vue.component('app', require('./components/AppComponent.vue').default);
Vue.component('profile', require('./components/ProfileComponent.vue').default);
Vue.component('InfiniteLoading', require('vue-infinite-loading'));



import router from './routes'
import fullPath  from './utils'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});

