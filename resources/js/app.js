require('./bootstrap');
window.Vue = require('vue');


Vue.component('admin-master', require('./components/admin/adminMaster.vue').default);
Vue.component('pagination', require('./components/partial/PaginationComponent').default);

//snotify
import Snotify, { SnotifyPosition } from 'vue-snotify'
const SnotifyOptions = {
    toast: {
        position: SnotifyPosition.rightCenter
    }
}
Vue.use(Snotify, SnotifyOptions)

// v-form
import {Form, HasError, AlertError} from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// excel
import excel from 'vue-excel-export'
Vue.use(excel)

//progress bar
import VueProgressBar from 'vue-progressbar'
const VueProgressBarOptions = {
    color: '#50d38a',
    failedColor: '#87111d',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
};
Vue.use(VueProgressBar, VueProgressBarOptions);

// vue-router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {projectRoutes} from './routes'
const router = new VueRouter({
    // routes
    routes: projectRoutes,
    mode: 'history'
})


// sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast

// moment
var moment = require('moment');

// editor support
import 'v-markdown-editor/dist/v-markdown-editor.css';
import Editor from 'v-markdown-editor'
Vue.use(Editor);


const app = new Vue({
    el: '#app',
    router,
    data:{
        moment: moment
    }
});
