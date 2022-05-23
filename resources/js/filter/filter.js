


import Vue from 'vue';
import moment from 'moment';

Vue.filter('time',(a)=>{
  return moment(a).format('MMMM Do YYYY');
});