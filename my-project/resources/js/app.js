require('./bootstrap');

import Vue from 'vue'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@mdi/font/css/materialdesignicons.css'
Vue.use(Vuetify);

Vue.component('test-component', require('./components/Test.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        iconfont: 'mdi',
    }),
});