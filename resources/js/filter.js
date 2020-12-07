import moment from 'moment';
import Vue from 'vue';

Vue.filter('timeformate', (value)=>{
    return moment(value).format('MMMM Do YYYY, h:mm:ss a');
})
Vue.filter('sortLentg', (text,length,sufix)=>{
    return text.substring(0,length)+sufix;
})
