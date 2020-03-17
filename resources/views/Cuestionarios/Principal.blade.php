@extends('layouts.Plantilla_Principal')
@section('content') 
	<h1><a href="{{url('SisPreg/Add')}}"> Añadir Preliminares</a></h1>
 @can('Editar Cuestionarios')
  @if($Cuestionarios->count()) 
 
<div class="row">
  <div class="col-4">
	<h3> Seleccione una presentación a editar</h3>
  </div>
  <div class="dropdown col-6">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Presentación
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
  	@foreach($Cuestionarios as $Cuestionario)
     <a class="dropdown-item" href="{{url('SisPreg/CrearPresentacion')}}?ID_Cuestionario={{$Cuestionario->ID_Cuestionario}}">{{$Cuestionario->NombreCuestionario}}</a>
	@endforeach 
    </div> 
  </div>
</div>
  @endif
	@endcan
@endsection