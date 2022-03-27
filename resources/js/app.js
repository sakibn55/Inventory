

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

 // Sweet Alert start
 import Swal from 'sweetalert2'
 window.Swal = Swal;
 const Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 3000,
     timerProgressBar: true,
     didOpen: (toast) => {
         toast.addEventListener('mouseenter', Swal.stopTimer)
         toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
 });
window.Toast = Toast;
 // Import Notification Class
 import Notification from './Helpers/Notification';
 window.Notification = Notification
const app = new Vue({
    el: '#app',
    router
});
