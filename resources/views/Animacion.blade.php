@extends('layouts.Plantilla_Principal')
@section('content') 
@can('Usuario')

	 
 
<div  class="container-fluid pb-5 justify-content-center" style="width: 1350px;">

	<div id="Animacion"  class="container col-10" > 
	
	   <div id="Presentacion" class="col-12 p-0 shadow-lg" >
	    
	    
	    <b-carousel
	      ref="Presentacion"
	      id="presen"
	    
	      v-model="slide"
	      :interval="0"
		  :no-touch="false" 
		  background="#000000"
	      img-width="1024"
	      img-height="480" 
	      @sliding-start="onSlideStart"
	      @sliding-end="onSlideEnd"
	      
	    > 
	       <b-carousel-slide caption="" img-blank img-alt="Blank image">
	     		<div class="continer-fluid p-0 m-0">
	     		<b-img src="./anim/1/Pren.jpg" fluid alt=" "></b-img>  
	     			
	     		
	     		</div>
	     	
			</b-carousel-slide>
	      <b-carousel-slide 
	      caption="Fuerzas intramoleculares" img-blank img-alt="Blank image" class="bg-white text-black">
	      <div style="font-size: 20px !important; color: black !important;" >
			Las fuerzas intramoleculares se refieren al enlace químico (iónico o covalente), mantienen a los átomos de una molécula juntos y son responsables de su estabilización.


			<div class="row container-fluid p-0 m-0" >
		
			<div class="col-6  justify-content-center text-center ">			
			<iframe style="border: 0px;     overflow:hidden; " scrolling="no" src="{{url('jsmol/Animate?width=400&height=350&smile=O&color=ffffff')}}" class="container" height="310px"></iframe>
		     	
	      	La molécula de agua tiene dos enlaces covalentes.
	      	</div>
	      <div class="col-6  justify-content-center text-center">	
	      		<iframe style="border: 0px;     "scrolling="no" src="{{url('jsmol/Animate?width=400&height=350&smile=N&color=ffffff')}}" class="container" height="310px"></iframe>
	      		La molécula de amoníaco (NH3) tiene tres enlaces.
	      </div>
	      </div>
	   	</div>

	      </b-carousel-slide> 
	
	     <b-carousel-slide   img-blank img-alt="Blank image" class="bg-white text-black"  >
             <div style="font-size: 20px !important; color: black !important;" >
Por otro lado, las fuerzas intermoleculares son aquellas que actúan entre moléculas y las mantienen cohesionadas.
    			<div class="row container-fluid justify-content-center text-center p-0 m-0" >
    				<div class="col-9  justify-content-center text-center ">			
    				<b-img src="./anim/1/Fuerzas_inter.png" fluid></b-img>
    	    	  </div>
            	</div>
            	<div>
            	Estas fuerzas son las principales responsables de las propiedades macroscópicas de la materia como el estado de agregación, los puntos de fusión y ebullición, la solubilidad, la tensión superficial y la densidad, entre otros.
            	</div>
            </div>
			</b-carousel-slide>
	
	<!-- imagen con video seguna  -->
	      <b-carousel-slide 
	      caption="Fuerzas intramoleculares" img-blank img-alt="Blank image" class="bg-white text-black">
	      <div style="font-size: 20px !important; color: black !important;" >
 En general, las fuerzas intermoleculares son más débiles que las intramoleculares; por este motivo, se necesita menos energía para evaporar un líquido o fundir un sólido que para romper los enlaces de sus moléculas. 

			<div class="row container-fluid p-0 m-0" >
		
			<div class="col-6  justify-content-center text-center ">	
					<b-img src="./anim/1/Puente_H.png" fluid></b-img>
	      	</div>
	      <div class="col-6  justify-content-center text-center">	
      	   <video width="500"   autoplay loop>
                  		<source src="{{url('Video/Tres_aguas_opt_plus_dinamica.mp4')}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' >
            </video>
            
	      </div>

	      </div>
	      	      <p>		     	Las fuerzas intermoleculares tienen un caracter cooperativo, el cuál es clave para entender las propiedades de los compuestos; por ejemplo, se requieren 41 kJ para evaporar un mol de agua , esta cantidad de energía es explicable solamente al tomar en cuenta este efecto cooperativo.</p>
	<p>                             Por otro lado, se requieren 930kJ de energía para romper los enlaces O-H de un mol de agua</p>
	      
	   	</div>
	  </b-carousel-slide>
	  
	     
	      <b-carousel-slide caption="Fuerzas intramoleculares" img-blank img-alt="Blank image">
	      <div class="container-fluid">
			<iframe style="border: 0px;" src="{{url('jsmol/Animate?width=400&height=400&smile=cc')}}" class="container" height="480px"></iframe>
	      </div>
	      </b-carousel-slide>
	
	    <b-carousel-slide 
	      caption="Fuerzas intramoleculares" img-blank img-alt="Blank image">

<div class="container-fluid">
			<iframe style="border: 0px;" src="{{url('jsmol/Animate?width=600&height=500&smile=_')}}" class="container" height="580px"></iframe>
	      </div>
	      
	      
	      </b-carousel-slide>
	    <b-carousel-slide 
	      caption="Fuerzas intramoleculares" img-blank img-alt="Blank image">

<div class="container-fluid">
			<iframe style="border: 0px;" src="{{url('jsmol/Animate?width=400&height=400&smile=Oc1ccc(cc1O)CCN')}}" class="container" height="480px"></iframe>
	      </div>
	      
	      
	      </b-carousel-slide>
	    <b-carousel-slide 
	      caption="Fuerzas intramoleculares" img-blank img-alt="Blank image">
<div class="container-fluid">

			<iframe style="border: 0px;" src="{{url('jsmol/Animate?width=400&height=400&smile=c1c(c(cc(c1O)O)O)CCN')}}" class="container" height="480px"></iframe>
	</div>
	      </b-carousel-slide>

	
	
	
	
	     	   
	  		  <b-carousel-slide caption="Líquido iónico en un nanotubo" img-blank img-alt="Blank image">
               <video width="750"   autoplay loop>
                  		<source src="{{url('Video/Tubo.mp4')}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' >
                </video>
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


 
 		<b-carousel-slide caption="Fuerzas intramoleculares" img-src="./anim/1/tensison.png" img-alt="Blank image" >
 	      
   			<div class="row recurso_preg" img-blank img-alt="Blank image">
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
@endsection
   