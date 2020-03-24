
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'jquery-ui/ui/widgets/datepicker.js';
import $ from 'jquery';
import FreeTransform from 'vue-free-transform';
import BootstrapVue from 'bootstrap-vue'

/*importaciones de ckeditor */
import ckeditor from '@ckeditor/ckeditor5-vue';
import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';

//import ClassicEditor 	from '@ckeditor/ckeditor5-build-classic';
global.ckeditor = ckeditor;
window.ckeditor = ckeditor;
global.DecoupledEditor =DecoupledEditor;
window.DecoupledEditor = DecoupledEditor;

window.$ = window.jQuery = $;
global.$ = global.jQuery = require('jquery');
window.FreeTransform=FreeTransform;
window.Vue = require('vue');
require('./bootstrap');
//import * as uiv from 'uiv'
Vue.use(BootstrapVue);
Vue.use(FreeTransform);
Vue.use(ckeditor);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var menu = new Vue({
    el: '#Menu',
});
Vue.component('Ani1', require('./components/Animacion/ani1.vue').default);

if($("#AUX").length!=0)  
var app = new Vue({   
	el: '#AUX',
    data() { 
        return { 
        	DatosEditor:"",
        	token:"",
        	obje:{},
        	editor: DecoupledEditor,
            editorData: '<p>Content of the editor.</p>',
            editorConfig: { 
            	toolbar: ['TextTransformation','|', 'heading', '|', 'fontSize', 'fontFamily', '|', 'bold', 'italic', 'Underline', 'Strikethrough', '|', 'alignment', '|', 'numberedList', 'bulletedList', '|', 'link', 'blockQuote',
                	 'fontColor', 'fontBackgroundColor',  'fontFamily','imageUpload', 'insertTable', 'mediaEmbed', '|', 'undo', 'redo'
                ],
                autosave: {
                    save( editor ) {
                        // The saveData() function must return a promise
                        // which should be resolved when the data is successfully saved.
                    	console.log("contenido total");
                    	return saveData( editor.getData() );
                    }},
                cloudServices: {
                	tokenUrl:'./token',
                     uploadUrl: './upload?_token=',
               
                },
                fontColor:{colors:["#6F5D5B","#4472c6","#CECFC9","#e83e8c","#fd7e14","#4C2418","#362F29","#bf5329"]},
                fontBackgroundColor:{colors:["#6F5D5B","#4472c6","#CECFC9","#e83e8c","#fd7e14","#4C2418","#362F29","#bf5329", "#f8f9f1","hsl(0,0%,0%)","hsl(0,0%,12.5%)","hsl(0,0%,25%)","hsl(0,0%,37.5%)","hsl(0,0%,50%)","hsl(0,0%,62.50%)","hsl(0,0%,75%)","hsl(0,0%,87.5%)",{color:"hsl(0,0%,100%)",hasBorder:!0},"hsl(0,100%,10%)","hsl(0,100%,20%)","hsl(0,100%,30%)","hsl(0,100%,40%)","hsl(0,100%,50%)","hsl(0,100%,60%)","hsl(0,100%,70%)","hsl(0,100%,80%)",{color:"hsl(0,100%,90%)",hasBorder:!0},"hsl(30,100%,10%)","hsl(30,100%,20%)","hsl(30,100%,30%)","hsl(30,100%,40%)","hsl(30,100%,50%)","hsl(30,100%,60%)","hsl(30,100%,70%)","hsl(30,100%,80%)",{color:"hsl(30,100%,90%)",hasBorder:!0},"hsl(60,100%,10%)","hsl(60,100%,20%)","hsl(60,100%,30%)","hsl(60,100%,40%)","hsl(60,100%,50%)","hsl(60,100%,60%)","hsl(60,100%,70%)","hsl(60,100%,80%)",{color:"hsl(60,100%,90%)",hasBorder:!0},"hsl(90,100%,10%)","hsl(90,100%,20%)","hsl(90,100%,30%)","hsl(90,100%,40%)","hsl(90,100%,50%)","hsl(90,100%,60%)","hsl(90,100%,70%)","hsl(90,100%,80%)",{color:"hsl(90,100%,90%)",hasBorder:!0},"hsl(120,100%,10%)","hsl(120,100%,20%)","hsl(120,100%,30%)","hsl(120,100%,40%)","hsl(120,100%,50%)","hsl(120,100%,60%)","hsl(120,100%,70%)","hsl(120,100%,80%)",{color:"hsl(120,100%,90%)",hasBorder:!0},"hsl(150,100%,10%)","hsl(150,100%,20%)","hsl(150,100%,30%)","hsl(150,100%,40%)","hsl(150,100%,50%)","hsl(150,100%,60%)","hsl(150,100%,70%)","hsl(150,100%,80%)",{color:"hsl(150,100%,90%)",hasBorder:!0},"hsl(180,100%,10%)","hsl(180,100%,20%)","hsl(180,100%,30%)","hsl(180,100%,40%)","hsl(180,100%,50%)","hsl(180,100%,60%)","hsl(180,100%,70%)","hsl(180,100%,80%)",{color:"hsl(180,100%,90%)",hasBorder:!0},"hsl(210,100%,10%)","hsl(210,100%,20%)","hsl(210,100%,30%)","hsl(210,100%,40%)","hsl(210,100%,50%)","hsl(210,100%,60%)","hsl(210,100%,70%)","hsl(210,100%,80%)",{color:"hsl(210,100%,90%)",hasBorder:!0},"hsl(240,100%,10%)","hsl(240,100%,20%)","hsl(240,100%,30%)","hsl(240,100%,40%)","hsl(240,100%,50%)","hsl(240,100%,60%)","hsl(240,100%,70%)","hsl(240,100%,80%)",{color:"hsl(240,100%,90%)",hasBorder:!0},"hsl(270,100%,10%)","hsl(270,100%,20%)","hsl(270,100%,30%)","hsl(270,100%,40%)","hsl(270,100%,50%)","hsl(270,100%,60%)","hsl(270,100%,70%)","hsl(270,100%,80%)",{color:"hsl(270,100%,90%)",hasBorder:!0},"hsl(300,100%,10%)","hsl(300,100%,20%)","hsl(300,100%,30%)","hsl(300,100%,40%)","hsl(300,100%,50%)","hsl(300,100%,60%)","hsl(300,100%,70%)","hsl(300,100%,80%)",{color:"hsl(300,100%,90%)",hasBorder:!0},"hsl(330,100%,10%)","hsl(330,100%,20%)","hsl(330,100%,30%)","hsl(330,100%,40%)","hsl(330,100%,50%)","hsl(330,100%,60%)","hsl(330,100%,70%)","hsl(330,100%,80%)",{color:"hsl(330,100%,90%)",hasBorder:!0}],columns:9,documentColors:18},fontColor:{colors:["black","gray","silver",{color:"white",hasBorder:!0},"maroon","red","purple","fuchsia","green","lime","olive","yellow","navy","blue","teal","aqua"],columns:4,documentColors:12},

            }, 
        }
    },
    mounted() { 
    	this.editorConfig.cloudServices.uploadUrl =this.editorConfig.cloudServices.uploadUrl + this.token;
    },
    beforeMount () {
        this.token= this.$el.attributes['Token'].value;
      	this.editorConfig.cloudServices.uploadUrl =this.editorConfig.cloudServices.uploadUrl + this.token; 
    }
    ,
    methods:{
        onReady(editor) {
            const toolbarContainer = document.querySelector(  '.document-editor__toolbar' );
            toolbarContainer.appendChild( editor.ui.view.toolbar.element ); 
            this.obje  =editor;
        },
   
          CargarDatos(){
        	  this.DatosEditor =  this.obje.getData();
          },
   
    }	
	
});

require('./Animacion');
require('./Cuestionarios');