
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
import JSmolWidget from 'jsmol-widget';
import FreeTransform from 'vue-free-transform';
window.$ = window.jQuery = $;

window.FreeTransform=FreeTransform;



global.$ = global.jQuery = require('jquery');


 
import 'jquery-ui/ui/widgets/datepicker.js';
require('./bootstrap');



import BootstrapVue from 'bootstrap-vue'


//import * as uiv from 'uiv'
window.Vue = require('vue');
Vue.use(BootstrapVue);
Vue.use(FreeTransform);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


var menu = new Vue({
    el: '#Menu'
});
 

Vue.component('Ani1', require('./components/Animacion/ani1.vue').default);

if($("#AUX").length!=0)  
var app = new Vue({    el: '#AUX'
});
require('./Animacion');
require('./Cuestionarios');