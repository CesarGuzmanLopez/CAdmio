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





