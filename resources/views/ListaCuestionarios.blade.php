@extends('layouts.Plantilla_Principal')
@section('content') 
@can('Usuario')
<div  class="container-fluid h-100 n0 p0  bg-info" id="AUX" style="min-height: 500px; padding: 0px; postion: relative;">
	<div class="row h-100 m-0 p-0">
	<div class=" col-4 p-0 m-0 h-100 bg-light  justify-content-center text-center center mt-5" style="min-height: 600px;font-size: 40px; ">
		<h1 class="m-4 text-info" style="font-size: 60px">TALIO</h1>
		<p ><span class="text-info" >TAL</span>leres academ<span class="text-info">I</span>c<span class="text-info">O</span>s</p> 
	<p>
	<b-img src="{{url('images/Talio.png')}}" fluid class="mt-4"></b-img>
	
	</p>
	</div>
	
	<div class="col-8 bg-dark text-white">
		<h1>Animaciones de ejemplo</h1>
		<h3>
			<a class="text-light" href="{{url('Animacion')}}">
				Fuerzas Intermoleculares
			</a>
		</h3>
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