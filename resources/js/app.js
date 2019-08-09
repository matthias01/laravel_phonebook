require('./bootstrap');

window.Vue = require('vue');

Vue.component('my-header', require('./components/Header.vue').default);
Vue.component('my-footer', require('./components/footer.vue').default);


const app = new Vue({
    el: '#app'
});
