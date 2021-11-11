// window.Vue = require('vue');
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

import router from './router';
import App from './components/App';
import store from './store/index';


Vue.use(VueAxios, axios);
Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    store,
    router
});