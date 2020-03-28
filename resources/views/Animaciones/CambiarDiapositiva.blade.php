@extends('layouts.Plantilla_Principal')
@section('content')
<div class="p-4"><a href="{{url('/Animaciones/Manage_Crud/Diapositivas?ID_Presentacion=')}}{{$diapositiiva->ID_Presentacion}}" class="btn btn-white text-info border-danger">regresar Diapositivas Editor <i class="fa fa-hand-point-left"></i></a></div>
<form action ="{{url('Animaciones/Manage_Crud/cahngeDiapo')}}" method="post" class="m-2 row text-center "  >
@csrf
	<div class="form-group col-4 ">
    	<label for="Nombre">Nombre</label> 
		<input  type ="text "name="Nombre" value="{{$diapositiiva->Nombre}}" class="form-control">	
	</div>
	<input type="hidden" name="ID_Dispositiva" value="{{$diapositiiva->ID_Dispositiva}}">
	<div class="form-group col-4 ">
    	<label for="ID_Pregunta"> ID Pregunta</label> 
		<input type="number" name="ID_Pregunta" value="{{$diapositiiva->ID_Pregunta}}" class="form-control">	
	</div>
	<div class="form-group col-4 ">
    	<label for="Numero_De_diapositiva"> Numero De diapositiva</label> 
		<input type="number" name="Numero_De_diapositiva" value="{{$diapositiiva->Numero_De_diapositiva}}" class="form-control">	
	</div>
	<div class="text-light bg-warning col-12"><h1><i class="fa fa-chevron-down"></i> ¡No tocar! <b>Almenos que sepas  que hacer</b> <i class="fa fa-chevron-down"></i></h1></div>	
	<div class="form-group col-12 p-4 ">
    	<textarea name="Texto" class="form-control" rows="10">
    		{!! $diapositiiva->Texto !!}
    	</textarea>
	</div>
	<button type="submit">Cambiar</button>
</form>
@endsection