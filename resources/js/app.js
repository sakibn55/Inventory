

require('./bootstrap');

// window.Vue = require('vue').default;
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import {
    routes
} from './routes';

//import user class
import User from './Helpers/User';
window.User = User;
const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'history',
})

const app = new Vue({
    el: '#app',
    router
});
