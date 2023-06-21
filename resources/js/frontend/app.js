require('../bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';
import User from '../helpers/User';
window.User = User
import Notification from '../helpers/Notification';
window.Notification = Notification

import { fpjsPlugin } from '@fingerprintjs/fingerprintjs-pro-vue-v2';


const apiKey = '<public-api-key>'

Vue.use(fpjsPlugin, {
    loadOptions: {
      apiKey: "DGizXQL1UiqHM2g4O0W9"
    },
  });




window.Reload = new Vue();
const router = new VueRouter({
  routes,
  mode: 'history'
})
const app = new Vue({
    el: '#app',
    router
});
