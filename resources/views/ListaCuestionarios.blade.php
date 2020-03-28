@extends('layouts.Plantilla_Principal')
@section('content') 
@can('Usuario')
<div  class="container-fluid h-100 n0 p0  bg-info" id="AUX"  style="min-height: 500px; padding: 0px; postion: relative;"  Token={{csrf_token()}} >
	<div class="row h-100 m-0 p-0">
	<div class=" col-4 p-0 m-0 h-100 bg-light  justify-content-center text-center center mt-5" style="min-height: 600px;font-size: 40px; ">
		<h1 class="m-4 text-info" style="font-size: 60px">TALIO</h1>
		<p ><span class="text-info" >TAL</span>leres academ<span class="text-info">I</span>c<span class="text-info">O</span>s</p> 
	<p>
	<b-img src="{{url('images/Talio.png')}}" fluid class="mt-4"></b-img> 
	</p>
	</div> 
    	<div class="col-8 bg-dark text-white pb-4">
    		<h1>Presentaciones interactivas </h1>  
    		
    	  <div class="col-10">
    		<div class="container-fluid">
    			<h2>Proto-Animacion</h2>
    		
    			<h2><a class="btn btn-light" href="{{url('/Animacion')}}">Ver presentación</a></h2>
    		</div>
    		
    		
    	</div>	
    		
    		  
    @foreach($Presentaciones as $pren)
    	<div class="col-10">
    		<div class="container-fluid">
    			<h2>{{$pren->Nombre}}</h2>
    			<p>{{$pren->Descripcion}}</p>
    			<p><a class="btn btn-light" href="{{url('VerPresentacion?ID_Presentacion=')}}{{$pren->ID_Presentacion}}">Ver presentación</a></p>
    		</div>
    		
    	</div>
    @endforeach
    	{{--
    	 		<h3>
    			<a class="text-light" href="{{url('Animacion')}}">
    				Fuerzas Intermoleculares
    			</a>
    		</h3> 
    	
    		<div class="text-dark bg-white">
                <div class="document-editor__toolbar"></div>
                <div class="document-editor__editable-container"> 
                    <ckeditor :editor="editor" :config="editorConfig"  @ready="onReady"  name="otro"  v-model="editorData" ref="editor"></ckeditor>
                </div>
    		</div> 
     	<br>
     	<hr>
     		<div class="container-fluid py-3">
   		   	 <button class="btn btn-xs btn-danger" class="form-control"  type="button" v-on:click="CargarDatos">
     	   	 	 Añadir datos Abajo
     	   	 </button>Sirve para hacer modificaciones manuales
</div>
   		<form action="./mo" method="get"> 
             <textarea rows="" cols=""  class="form-control" name="Editor_imagen" v-model="DatosEditor" required="required"></textarea>
     	
		</form>
		--}}
    	</div>


   </div>
	
	
	
</div>
@endcan
@endsection

		{{--
  	@foreach($Cuestionarios as $Cuestionario)
     <p><a href="{{url('Animacion')}}?ID_Cuestionario={{$Cuestionario->ID_Cuestionario}}">{{$Cuestionario->NombreCuestionario}}</a></p>
	@endforeach
	--}} 