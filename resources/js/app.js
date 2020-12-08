require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import Vuetify from 'vuetify';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

let app = new Vue({

	el: '#app',

	router: new VueRouter(routes),
	vuetify: new Vuetify(),
	axios: new VueAxios()

});