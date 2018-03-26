/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$http = axios;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import userForm from './components/user/userForm';

Vue.component('login-form', require('./components/auth/LoginForm.vue'));
Vue.component('register-form', require('./components/auth/RegisterForm.vue'));
Vue.component('email-reset-password-form', require('./components/auth/EmailResetPasswordForm.vue'));
Vue.component('reset-password-form', require('./components/auth/ResetPasswordForm.vue'));
Vue.component('user-form', userForm);
Vue.component('clock', require('./components/clock/Clock.vue'));

const app = new Vue({
    el: '#app'
});
