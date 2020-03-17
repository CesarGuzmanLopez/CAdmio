@extends('layouts.Plantilla_Principal')
@section('content') 
@can('Usuario')

	 
 
<div  class="container-fluid pb-5 justify-content-center" >

	<div id="Animacion"  class="container col-9 "> 
	
	   <div id="Presentacion" class="col-12 p-0 shadow-lg" >
	    
	    
	    <b-carousel
	      ref="Presentacion"
	      id="presen"
	      v-model="slide"
	      :interval="0"
		  :no-touch="true" 
		  background="#d9d098"
	      img-width="1024"
	      img-height="480" 
	      @sliding-start="onSlideStart"
	      @sliding-end="onSlideEnd"
	      
	    > 
	      <b-carousel-slide 
	      
	      caption="Fuerzas intramoleculares" img-blank img-alt="Blank image">
			<iframe frameBorder="0" src="{{url('js/liteNCI2.htm')}}" width="500" height="480" ></iframe>
	      </b-carousel-slide>
	     
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
		     
		     
		     <Transform
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
	          </Transform>
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
	
	<div id="">

	
	</div>
	

      <!-- div id="Preguntas" ID_Cuestionario="{{$Cuestionario->ID_Cuestionario}}" class="pb-5">
            <div class="row">
            	<div class="col-11">	
            		<b-table striped hover :items="items"> </b-table>
            	</div>
            </div>
        </div-->


</div>

@endcan

@endsection
@section('scripts')
    @parent
<script type="text/javascript">


;(function() {

// ?_USE=JAVA   ?_USE=SIGNED   ?_USE=HTML5

// Developers: The _debugCode flag is checked in j2s/java/core.z.js, 
// and, if TRUE, skips loading the core methods, forcing those
// to be read from their individual directories. Set this
// true if you want to do some code debugging by inserting
// System.out.println(x), document.title=x, or alert(x) 
// anywhere in the Java or Jmol code.

var s = document.location.search;
Jmol._debugCode = (s.indexOf("debugcode") >= 0);

jmol_isReady = function(applet) {
	document.title = (applet._id + " is ready")
	Jmol._getElement(applet, "appletdiv").style.border="1px solid blue"
 
}		

InfoA = {
	width: "100%",
	height: "100%",
	debug: false,
	color: "white",
	addSelectionOptions: false,
	serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/php/jsmol.php",
	use: "HTML5",
  coverImage: "",//"data/1hxw.png",        // initial image instead of applet
  coverScript: "",	// special script for click of cover image (otherwise equal to script)
  deferApplet: false,                  // wait to load applet until click
  deferUncover: false,                 // wait to uncover applet until script completed
  jarPath: "java",
	j2sPath: "j2s",
	jarFile: "JmolApplet.jar",
	isSigned: false,
	//disableJ2SLoadMonitor: true,
	//disableInitialConsole: true,
	readyFunction: jmol_isReady,
	//defaultModel: "$dopamine",
	script: "load data/caffeine.mol;"
}


})();

$(document).ready(function(){
  $("#appletplace1").html(Jmol.getAppletHtml("jmol1", InfoA));
});

</script>
@endsection
   