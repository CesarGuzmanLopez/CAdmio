@extends('layouts.Plantilla_Principal')
@section('content')

<form action ="{{url('Animaciones/Manage_Crud/cambiarAni')}}" method="get" class="m-2 col-11"  >

@csrf
   		
Nombre<input name="Nombre" value="{{$presentacion->Nombre}}" class="form-control">
Descripción<input class="form-control" name="Descripcion" value="{{$presentacion->Descripcion}}">
<input class="form-control" type="hidden" name="ID_Presentacion" value="{{$presentacion->ID_Presentacion}}">
<button type="submit" class="btn btn-warning m-2">Cambiar</button>	
</form>


@endsection