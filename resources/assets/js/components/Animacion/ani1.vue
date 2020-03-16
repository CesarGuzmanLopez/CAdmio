<template> 
  <div class="container-fluid">	
  	<div class="row">
  	<div id="Presentacion" class="col-12 p-0 shadow-lg" >
	    <b-carousel
	      ref="Presentacion"
	      id="presen"
	      v-model="slide"
	      :interval="0"
		  :no-touch="true" 
		  background="#ababab"
	      img-width="1024"
	      img-height="480" 
	      @sliding-start="onSlideStart"
	      @sliding-end="onSlideEnd"
	    > 
	    
	     <b-carousel-slide caption="Fuerzas intramoleculares" img-blank img-alt="Blank image">
	     		<div>
	     		Las fuerzas intramoleculares mantienen juntos a los
	     		 átomos de una molécula y son responsables 
	     		 de su estabilización. Las fuerzas intramoleculares 
	     		 se refieren al enlace químico (iónico o covalente).
	     		</div>
	     		<b-img src="./anim/1/enlace.gif" fluid alt=" "></b-img>  
	     </b-carousel-slide>
	  	<b-carousel-slide caption="cohesion" img-blank img-alt="Blank image">
	     <div>intenta poner los atomos en su lugar  <span class="tr-transform__rotatore">  </span>   para rotar</div>
	     
	     <div class="wrapper">
	    <div class="workspace" ref="workspace"> 
		     
		     
		     <FreeTransform
	            v-for="element in elements"
	            :key="element.id"
	            :x="element.x"
	            :y="element.y"
	            :scale-x="element.scaleX"
	            :scale-y="element.scaleY"
	            :width="element.width"
	            :height="element.height"
	            :angle="element.angle"
	            :offset-x="offsetX"
	            :offset-y="offsetY"
	            :disable-scale="element.disableScale === true"
	            @update="update(element.id, $event);"
	          >
	            <div class="element" :style="getElementStyles(element)">
	              	  <b-img src="./anim/1/Atomo.png" fluid alt="pregunta"> </b-img> 
	            </div>
	          </FreeTransform>
	          </div>
	          </div>
	      </b-carousel-slide>  
	      <b-carousel-slide    img-src="./anim/1/tensison.png">
   			<div class="row    recurso_preg">
   				<div class="col-3 col-md-2  offset-9 p-2 mt-2 "> 
   				<div class="preg"   @click="toggleModal">
	   				<b-img src="./anim/1/pregunta.png" fluid alt="pregunta">
	   				</b-img>Pregunta </div>
   				</div>
   				<div></div>
				</div>
	      </b-carousel-slide>
	      <!-- Slides with custom text -->
	      <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54"  img-alt="Blank image">
	     
	      </b-carousel-slide>
	
	     
	      <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
	      <b-carousel-slide>
	        <template v-slot:img>
	          <img
	            class="d-block img-fluid w-100"
	            width="1024"
	            height="480"
	            src="https://picsum.photos/1024/480/?image=55"
	            alt="image slot"
	          >
	        </template>
	      </b-carousel-slide> 
	      <!-- Slide with blank fluid image to maintain slide aspect ratio -->
	     
	    </b-carousel>
		</div>
	</div><!-- fin de row -->
	<div class="row row justify-content-center">
	  	<div class="col-6 mt-4 p-2" ><div class="row controls" > 
	  		<div class="col-6 text-center"><div class="fa fa-arrow-left " @click="prev_Presentacion" ></div></div>
	  		<div class="col-6 text-center"><div class="fa fa-arrow-right" @click="next_Presentacion"></div></div>
  		</div></div>
	
		
	</div>
    <b-modal ref="my-modal" hide-footer title="Cual es la forma de compensar un buen trabajo">
      <div class="d-block ">
        <div id="demo" > 
			  <div class="respuestas">
			    <input type="radio" name="preg1" value="1" /> Un auto<br />
			    <input type="radio" name="preg1" value="2" /> Unas Papitas<br />
			    <input type="radio" name="preg1" value="4" /> Una gran hamburgesa<br />
			    <input type="radio" name="preg1" value="5" /> Dinero<br />
			    <input type="radio" name="preg1" value="6" /> todas las anteriores <br />
			    
			  </div>
		
	  </div>
      
      </div>
      <b-button class="mt-3"  block v-b-toggle.collapse-1-inner >Ver respuesta</b-button>
      	<b-collapse id="collapse-1-inner" class="mt-2">
        <b-card>Todas las anteriores</b-card>
      </b-collapse>
      <b-button class="mt-2" variant="outline-warning" block @click="toggleModal">Contestar</b-button>
    </b-modal>
  </div>
</template>

<script>
import FreeTransform from "vue-free-transform";
  export default {
 	  components: {
		    FreeTransform
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

    computed: {

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
  }
  
</script>
<style>

.carousel-caption {
	top: 0;
    bottom: auto;
	padding: 0;	  
	margin:0;
	left:0 !important;
	right: 0px;

}
.controls{
	text-shadow: 4px 4px #211310; 
	color: gray; 
	font-size: calc(4px + 4vw); 
}
.recurso_preg{ 
	
	color: black;
 	text-align: center;
	font-size: calc(3px + 1vw); 
	text-shadow: 1px 1px #211310; 
	
}
.recurso_preg .preg{
	  padding: 4px; 
	  background-color: rgba(222, 233, 244, 0.35); 
}

.recurso_preg .preg:hover{
	cursor:help; 
	padding: 0px;
}



/*ROTAR*/


.wrapper {
  flex: 1;
}

.workspace {
  width: 800px;
  height: 800px;
  margin: 25px auto;
  
}

 

.tr-transform__content {
  user-select: none;
}

.tr-transform__rotator {
  top: 5px;
  left: calc(50% - 7px);
}

.tr-transform__rotatore	
  { 
  width: 10px;
  height: 10px;
  border-radius: 50%;
  padding:11px;
  box-shadow: 0 2px 4px 0 rgba(3, 13, 53, 0.4);
  border: 1px solid rgba(22, 123, 244, 0.5);
  background-color: rgba(22, 123, 244, 0.5);
}
.tr-transform__rotator 	
  {
  
  width: 15px;
  height: 15px;
  border-radius: 50%;
  position: absolute;
  box-shadow: 0 2px 4px 0 rgba(3, 13, 53, 0.4);
  border: 1px solid rgba(22, 123, 244, 0.5);
  background-color: rgba(22, 123, 244, 0.5);
  cursor: pointer;
}
.tr-transform__rotator:hover,
  {
  background: #f1f5f8;
}

.tr-transform__rotator:active,
  {
 
}


</style>