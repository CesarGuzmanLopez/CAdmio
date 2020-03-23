@extends('layouts.Plantilla_Principal')
@section('content') 
@can('Usuario')
<div  class="container-fluid pt-4 justify-content-center" style="width: 1300px;"> 
	<div id="Animacion"  class="container-fluid" >  
	   <div id="Presentacion" class="col-12 p-0 shadow-lg" >
	    <b-carousel
	      ref="Presentacion"
	      id="presen" 
	      v-model="slide"
	      :interval="0"
		  :no-touch="true"
	      img-width="1024"
	      img-height="400" 
	      @sliding-start="onSlideStart"
	      @sliding-end="onSlideEnd" 
		  class="bg-white" 
	    >
 	  <!-- Pregunta de Imagen -->
	  <b-carousel-slide  img-blank img-alt="Blank image" class="p-0">
			  <div class="container-fluid row justify-content-center text-center text-dark">
				<h2>Completa el mapa conceptual a partir de los esquemas que se proponen</h2>
				<div class="col-7">	
    				<b-img src="{{url('images/preg.png')}}" fluid ></b-img>
			  	</div>
    			<div class="col-12 text-left" >
    				<div class="continer-fluid m-0 p-0">
    					<div class="row m-0 p-0">
        					<div class="col"><b-img src="{{url('images/preg.png')}}" fluid ></b-img>
        					</div>
        					<div class="col"><b-img src="{{url('images/preg.png')}}" fluid ></b-img></div>
        					<div class="col"><b-img src="{{url('images/preg.png')}}" fluid ></b-img></div>
        					<div class="col"><b-img src="{{url('images/preg.png')}}" fluid ></b-img></div>
        					<div class="col"><b-img src="{{url('images/preg.png')}}" fluid ></b-img></div>
        					<div class="col"><b-img src="{{url('images/preg.png')}}" fluid ></b-img></div>
        					<div class="col"><b-img src="{{url('images/preg.png')}}" fluid ></b-img></div>
    					</div>
    					<form>
    					<div class="row m-0 p-0">
        		
        					<div class="col">
            					 <div class="form-group p-0 m-0">
            						{!!Form::select('size', array(' ' ,'L' => 'Large', 'S' => 'Small'), null , array('class' => 'form-control p-0 m-0', 'id'=>"mi_id",'required' ))!!}
            					</div>	
        					</div>
        				
        					<div class="col">
        					<div class="form-group p-0 m-0">
            						{!!Form::select('size', array(' ' ,'L' => 'Large', 'S' => 'Small'), null , array('class' => 'form-control p-0 m-0', 'id'=>"mi_id",'required' ))!!}
            					</div>	
        					</div>
        					<div class="col">
        					<div class="form-group p-0 m-0">
            						{!!Form::select('size', array(' ' ,'L' => 'Large', 'S' => 'Small'), null , array('class' => 'form-control p-0 m-0', 'id'=>"mi_id",'required' ))!!}
            					</div>	
        					</div>
        					<div class="col">
        					<div class="form-group p-0 m-0">
            						{!!Form::select('size', array(' ' ,'L' => 'Large', 'S' => 'Small'), null , array('class' => 'form-control p-0 m-0', 'id'=>"mi_id",'required' ))!!}
            					</div>	
        					
        					</div>
        					<div class="col">
        					<div class="form-group p-0 m-0">
            						{!!Form::select('size', array(' ' ,'L' => 'Large', 'S' => 'Small'), null , array('class' => 'form-control p-0 m-0', 'id'=>"mi_id",'required' ))!!}
            					</div>	
        					</div>
        					<div class="col">
        					<div class="form-group p-0 m-0">
            						{!!Form::selectRange('number', 1, 5, 0 , array('class' => 'form-control p-0 m-0', 'id'=>"mi_id",'required' ))!!}
            					</div>	
            				</div>
        					<div class="col">
        					<div class="form-group p-0 m-0">
            						{!!Form::select('size', array(' ' ,'L' => 'Large', 'S' => 'Small'), null , array('class' => 'form-control p-0 m-0', 'id'=>"mi_id",'required' ))!!}
            					</div>
        					</div> 
    					</div>
    					</form>
    					{!!Form::submit('Click Me!')!!}
    				</div>
    				
    			</div>
			</div>
			
	      </b-carousel-slide>
	
 		<b-carousel-slide  img-blank   style="background-image:url('{{url('./anim/1/tensison.png')}}') !important; background-blend-mode: color;background: round;" >
   			<div class="row recurso_preg text-dark"  img-alt="Blank image"  >
   				<div class="text-center col-12"><h1 class="text-light">"Fuerzas intermoleculares"</h1>	</div>
   				<div class="col-3 col-md-2  offset-9 p-2 mt-2 "> 
   				<div class="preg"   @click="toggleModal">
	   				<b-img src="./anim/1/pregunta.png" fluid alt="pregunta">
	   				</b-img>Pregunta </div>
   				</div>
			</div>
	    </b-carousel-slide>
	    <b-carousel-slide  img-blank img-alt="Blank image" >
	     	<div class="continer-fluid p-0 m-0  text-dark h-100 mt-5" style="font-size: 80px" >
		    	<p class ="text-black"><span class="text-info" >TAL</span>leres academ<span class="text-info">I</span>c<span class="text-info">O</span>s</p>
	     	</div>	     	
		</b-carousel-slide>
	    <b-carousel-slide img-blank img-alt="Blank image" class=" text-black">
	      	<div style="font-size: 20px !important; " class=" text-dark" >
				<h3>Fuerzas intramoleculares</h3>
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
	
	     <b-carousel-slide   img-blank img-alt="Blank image"  >
             <div style="font-size: 20px !important; " class="text-dark" >
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
	      <b-carousel-slide  img-blank   >
	      <div style="font-size: 20px !important; " class="text-dark" >
 En general, las fuerzas intermoleculares son más débiles que las intramoleculares; por este motivo, se necesita menos energía para evaporar un líquido o fundir un sólido que para romper los enlaces de sus moléculas. 

			<div class="row container-fluid p-0 m-0" >
		
			<div class="col-6  justify-content-center text-center ">	
					<b-img src="./anim/1/Puente_H.png" fluid></b-img>
	      	</div>
	      <div class="col-6  justify-content-center text-center">	
      	   		<video width="500"   autoplay loop muted="muted">
                  		<source src="{{url('Video/Tres_aguas_opt_plus_dinamica.mp4')}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' >
            	</video>
	      </div>
	      </div>
	      	<p> Las fuerzas intermoleculares tienen un caracter cooperativo, el cuál es clave para entender las propiedades de los compuestos; por ejemplo, se requieren 41 kJ para evaporar un mol de agua , esta cantidad de energía es explicable solamente al tomar en cuenta este efecto cooperativo.</p>
			<p> Por otro lado, se requieren 930kJ de energía para romper los enlaces O-H de un mol de agua</p>
	   	</div>
	  </b-carousel-slide>
	
	    <b-carousel-slide      img-blank  >
		<div class="container-fluid text-dark">
			<iframe style="border: 0px;" src="{{url('jsmol/Animate?width=400&height=400&smile=Oc1ccc(cc1O)CCN')}}" class="container" height="480px"></iframe>
	      </div> 
	      </b-carousel-slide>
	    <b-carousel-slide img-blank img-alt="Blank image">
        	<div class="container-fluid text-dark">
        		<div>
        		"Fuerzas intermoleulares"
        		</div>
        			<iframe style="border: 0px;" src="{{url('jsmol/Animate?width=400&height=400&smile=c1c(c(cc(c1O)O)O)CCN')}}" class="container" height="480px"></iframe>
        	</div>
	    </b-carousel-slide> 
	  	<b-carousel-slide  img-blank img-alt="Blank image">
        	<div class="container-fluid text-dark">
            	<h1>"Líquido iónico en un nanotubo"</h1>	
            
            	<video width="750"   autoplay loop>
              		<source src="{{url('Video/Tubo.mp4')}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' >
            	</video>
            
 	      	</div>
 	   </b-carousel-slide>
	  	
	  	
	  	
        <b-carousel-slide  img-blank img-alt="Blank image"> 
        	<div> Fuerzas intramoleculares</div>
        	<div class="text-dark">
        	Las fuerzas intramoleculares mantienen juntos a los
        	 átomos de una molécula y son responsables 
        	 de su estabilización. Las fuerzas intramoleculares 
        	 se refieren al enlace químico (iónico o covalente).
        	</div>
        	<b-img src="./images/intramolecular.gif" fluid alt=" " ></b-img>  
        </b-carousel-slide>



	      <!-- Slides with custom text -->
	
	      <!-- Slide with blank fluid image to maintain slide aspect ratio -->
	    </b-carousel> 

	</div> 

	<div class="row row justify-content-center">
	  	<div class="col-6 mt-4 p-2" ><div class="row controls" > 
	  		<div class="col-6 text-center"><div class="fa fa-arrow-left " @click="prev_Presentacion" ></div></div>
	  		<div class="col-6 text-center"><div class="fa fa-arrow-right" @click="next_Presentacion"></div></div>
  		</div>
  	</div>	
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
</div>
@endcan

@endsection
@section('scripts')
    @parent
@endsection
   