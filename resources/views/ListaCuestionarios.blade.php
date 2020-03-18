@extends('layouts.Plantilla_Principal')
@section('content') 
@can('Usuario')
<div  class="container-fluid row ">
	<div class="col-8 p-2 mt-4 height-100 justify-content-center text-center">
	<h1>   <a href="{{url('Animacion')}}">Fuerzas Intermoleculares</a></h1>
		
		{{--
  	@foreach($Cuestionarios as $Cuestionario)
     <p><a href="{{url('Animacion')}}?ID_Cuestionario={{$Cuestionario->ID_Cuestionario}}">{{$Cuestionario->NombreCuestionario}}</a></p>
	@endforeach
	--}} 
	
	</div>	
</div>
@endcan
@endsection