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
		@foreach($diapositivas as $Diapositiva)
			{!!$Diapositiva->Texto!!}
		@endforeach
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
   