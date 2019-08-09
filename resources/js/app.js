require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import About from './components/About.vue';

Vue.use(VueRouter);

Vue.component('my-header', require('./components/Header.vue').default);
Vue.component('my-footer', require('./components/footer.vue').default);

const routes = [
    {
        path : '/',
        component: Home
    },
    {
        path : '/about',
        component: About
    }
]

const router = new VueRouter({
    mode: 'history',
    routes,
})

const app = new Vue({
    router,
    el: '#app'
});
