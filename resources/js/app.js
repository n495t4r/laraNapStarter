/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';
import VueProgressBar from 'vue-progressbar';

import Swal from 'sweetalert2';
window.Swal = Swal;

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '4px'
});

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

import VueRouter from 'vue-router';
Vue.use(VueRouter);


const routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/monitors', component: require('./components/Monitors.vue').default }
  ]

  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })
  
  //sweet alert global const
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
  window.Fire = new Vue();

  //global functions
  Vue.filter('toUpper', function(the_text){
    if (!the_text) return ''
    the_text = the_text.toString()
    return the_text.charAt(0).toUpperCase() + the_text.slice(1)
  });

  Vue.filter('the_date', function(the_date) {
    return moment(the_date).format('MMMM Do YYYY')
  });


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


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router
  }).$mount('#app');
