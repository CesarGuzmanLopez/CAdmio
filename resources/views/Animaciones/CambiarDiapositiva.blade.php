@extends('layouts.Plantilla_Principal')
@section('content')
<div class="p-4"><a href="{{url('/Animaciones/Manage_Crud/Diapositivas?ID_Presentacion=')}}{{$diapositiiva->ID_Presentacion}}" class="btn btn-white text-info border-danger">regresar Diapositivas Editor <i class="fa fa-hand-point-left"></i></a></div>


<form action ="{{url('Animaciones/Manage_Crud/cahngeDiapoPost')}}" method="get" class="m-2 col-11"  >
	
@csrf

</form>




@endsection