
if($("#Animacion").length!=0)  {
	app = new Vue({
	    el: '#Animacion',
	   
	    components:{ 
	    	'Transform':FreeTransform
	    },
		data() {
	    	  return {
	              elements: [
	                  {
	                    id: "el-1",
	                    x: 100,
	                    y: 50,
	                    scaleX: 1,
	                    scaleY: 1,
	                    width: 100,
	                    height: 100,
	                    angle: 43,
	                    classPrefix: "tr",
	                    styles: {
	                     }
	                  },
	                  {
	                    id: "el-2",
	                    x: 225,
	                    y: 100,
	                    scaleX: 1,
	                    scaleY: 1,
	                    width: 100,
	                    height: 100,
	                    angle: 54,
	                    classPrefix: "tr2",
	                    text: "Scale Enabled",
	                    styles: {
	                      padding: `5px`,
	                     }
	                  },
	                  {
	                    id: "el-3",
	                    x: 360,
	                    y: 100,
	                    scaleX: 1,
	                    scaleY: 1,
	                    width: 100,
	                    height: 100,
	                    angle: 0,
	                    classPrefix: "tr2",
	                    text: "Scale Disabled",
	                    styles: {
	                      padding: 5,
	                      width: "100%",
	                      height: "100%",
	                     },
	                    disableScale: true
	                  }, 
	                ],
	        	  
	        	  slide: 0,
	              sliding: null	,
	           	  valor:29,
	           	  offsetX: 0,
	              offsetY: 0
	          }
	    },
	    mounted() {
		 	this.offsetX = this.$refs.workspace.offsetLeft;
		    this.offsetY = this.$refs.workspace.offsetTop;
	         
	    },
	    methods: { 
	    	prev_Presentacion(){ 
	    		if(this.slide>0){
	     			this.$refs.Presentacion.prev();	
	     		
	    		}
	     	},
	    	next_Presentacion(){
	    		if(this.slide < $("#presen").find('.carousel-item').length-1 ){
	     			this.$refs.Presentacion.next();
	    		}
	    		 
	    	}
	    	,
	    	onSlideStart(slide) {
	        	this.sliding = true 
	        },
	        onSlideEnd(slide) {
	            this.sliding = false
	        },
			update(id, payload) {
	      		this.elements = this.elements.map(item => {
	        		if (item.id === id) {
	          		return {
	            		...item,
	            		...payload
	          		};
	        	}
	        	return item;
	     		});
	    	},
	    	toggleModal() {
	            // We pass the ID of the button that we want to return focus to
	            // when the modal has hidden
	            this.$refs['my-modal'].toggle('#toggle-btn')
	          },
	   		getElementStyles(element) {
		      const styles = element.styles ? element.styles : {};
		      return {
		        width: `${element.width}px`,
		        height: `${element.height}px`,
		        ...styles
		      };
	    	}
	    }
	}); 

}
