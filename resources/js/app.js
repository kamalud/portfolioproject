

require('./bootstrap');

window.Vue = require('vue').default;
// Vue Router =============================================
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes/routes'
// Swert alert =============================================

import Swal from 'sweetalert2'
window.Swal = Swal;
// Moment js =============================================

import {filter} from './filter/filter'
import './helpers/mixin'


import CKEditor from '@ckeditor/ckeditor5-vue2';

Vue.use( CKEditor );
// Vue Toast adn swertalert =============================================

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
})

window.Toast = Toast;

// Vue from =============================================

import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;
// Vue ElementUI =============================================
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
Vue.use(ElementUI, { locale })
import 'element-ui/lib/theme-chalk/index.css';
// Vue ElementUI =============================================

import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/store'
const store = new Vuex.Store(
  storeData
)



Vue.component('adminhome', require('./components/backend/page/adminHome.vue').default);
Vue.component('header-bar', require('./components/backend/inc/header.vue').default);
Vue.component('menu-bar', require('./components/backend/inc/menu.vue').default);



const router = new VueRouter({
  mode:'history',
    routes // short for `routes: routes`
  })

const app = new Vue({
    el: '#app',
    router,
    store
});
