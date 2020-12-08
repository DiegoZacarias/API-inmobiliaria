require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import Vuetify from 'vuetify';
import axios from 'axios';
import VueAxios from 'vue-axios';
import '@mdi/font/css/materialdesignicons.css';

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const vuetify = new Vuetify({
  icons: {
    iconfont: 'mdiSvg', // default - only for display purposes
  },
})

let app = new Vue({

	el: '#app',

	router: new VueRouter(routes),
	vuetify,
	axios: new VueAxios()

});