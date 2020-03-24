if($("#AddTemas").length!=0)  
app = new Vue({
    el: '#AddTemas',
    components:{
    	
    },
	data() {
   	 return {
   		 contenido:"palabra",
         items: [],
     }
    },
    mounted() {
        this.totalRows = this.items.length
        axios.get('/SisPreg/ObtenerTemas').then(response =>{
        	console.log(response.data);
        	this.items = response.data;
            this.isBusy= false;
            this.totalRows = this.items.length; 
        }); 
    },
});
if($("#Cuestionario").length!=0)  
	app = new Vue({
	    el: '#Cuestionario',
	    components:{
	    	
	    },
		data() {
	   	 return {
 	         items: [],
	     }
	    },
	    mounted() {
	        this.totalRows = this.items.length
	        axios.get('/SisPreg/ObtenerCuestionario').then(response =>{
	        	console.log(response.data);
	        	this.items = response.data;
	            this.isBusy= false;
	            this.totalRows = this.items.length; 
	        }); 
	    },
	});




if($("#ID_TipoRespuesta").length!=0)  
	app = new Vue({
	    el: '#tipo_resps',
	    components:{
	    	
	    },
		data() {
	   	 return {
 	         items: [],
	     }
	    },
	    mounted() {
	        this.totalRows = this.items.length
	        axios.get('/SisPreg/Obtenertipo_resps').then(response =>{
	        	console.log(response.data);
	        	this.items = response.data;
	            this.isBusy= false;
	            this.totalRows = this.items.length; 
	        }); 
	    },
	});

/*
 * 
 * Obtener Las Preguntas de un examen
 * */
if($("#Preguntas").length!=0)  
	app = new Vue({
	    el: '#Preguntas',
	    components:{
	    	
	    },
		data() {
	   	 return {
 	         todo: [],
 	     
 	         items:[],
 	         id :-1, 
	     }
	    },
	    beforeMount () {
	        this.id= this.$el.attributes['ID_Cuestionario'].value;
	    
	    },
	    mounted() {
	        this.totalRows = this.items.length
	        axios.get('/SisPreg/GetPreguntas?ID_Cuestionario='+this.id).then(response =>{
	        	this.items = response.data;
	        	todo = this.todo;
	            this.isBusy= false;
	   
	        	this.totalRows = this.items.length; 
	        	
	        }); 
	        
	       
	    },
	});

if($("#Crear_Respuestas").length!=0)  
	app = new Vue({
	    el: '#Crear_Respuestas',
	    components:{
	    	
	    },
		data() {
	   	 return {
 	         todo: [],
 	         items:[],
	     }
	    },
	    beforeMount () {
	        this.id= this.$el.attributes['ID_Pregunta'].value;
	    
	    },
	    mounted() {
	        this.totalRows = this.items.length
	        axios.get('/SisPreg/GetRespuestas?ID_Pregunta='+this.id).then(response =>{
	        	this.items = response.data;
	        	todo = this.todo;
	            this.isBusy= false;
	        	this.totalRows = this.items.length; 
	      
	        });       
	    },
	});


if($("#TextoAdd").length!=0)  {
	var app = new Vue({   
		el: '#TextoAdd',
	    data() { 
	        return { 
	        	DatosEditor:"",
	        	token:"",
	        	obje:{},
	        	bgColor:"#ffffff",
	        	editor: DecoupledEditor,
	            editorData: '<p>Contenido</p>',
	            editorConfig: { 
	            	toolbar: ['|', 'heading', '|', 'fontSize', 'fontFamily', '|', 'bold', 'italic', 'Underline', 'Strikethrough', '|', 'alignment', '|', 'numberedList', 'bulletedList', '|', 'link', 'blockQuote',
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
	                	tokenUrl:'/token',
	                     uploadUrl: '/upload?_token=',
	               
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
	        	  console.log("hago algo");
	        },
	   
	    }	
		
	});

	
	
	
}


