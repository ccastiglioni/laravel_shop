/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('login-componente', require('./components/Login.vue').default);
//Vue.component('reset-senha-componente', require('./components/ResetSenha.vue').default);
Vue.component('home-componente', require('./components/Home.vue').default);
Vue.component('about-componente', require('./components/About.vue').default);
Vue.component('contact-componente', require('./components/Contact.vue').default);
Vue.component('register-componente', require('./components/Register.vue').default);
Vue.component('produto-componente', require('./components/Produto.vue').default);
Vue.component('produto-detalhe-componente', require('./components/ProdutoDetalhe.vue').default);
Vue.component('shop-cart', require('./components/ShopCart.vue').default);

const app = new Vue({
    el: '#app',
});
