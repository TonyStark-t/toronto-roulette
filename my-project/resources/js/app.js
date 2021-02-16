require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@mdi/font/css/materialdesignicons.css'
import router from './router'
Vue.use(Vuetify);

// Vue.component('test-component', require('./components/Test.vue').default);

const app = new Vue({
    el: '#app',
    router: router,
    vuetify: new Vuetify(),
});

export default new Vuetify({
    icons: {
        iconfont: 'md',
    },
})