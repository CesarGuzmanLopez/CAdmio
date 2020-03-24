@extends('layouts.Plantilla_Principal')
@section('content')
<?php $numeroDiapo =0;
$ID_Presentacion =0;
?>
<div class="container-fluid m-2">
	<div class="row">
		<div class="col-md-8 col-12">
		    <table border="2px">
     		  <tr>
                <th>ID diapositiva</th>
                <th>Numero de dispositiva</th>
                <th>Nombre</th>
                <th>Texto Contenido Compilado</th>
                <th>ID Pregunta</th>
              </tr>
            	@foreach($diapositivas as $pren)
					<?php $numeroDiapo = $pren->Numero_De_diapositiva; $ID_Presentacion =$pren->ID_Presentacion; ?>
                	<tr>
                		<td>{{$pren->ID_Dispositiva}}</td><td>{{$pren->Numero_De_diapositiva}}</td><td>{{$pren->Nombre}}</td><td><textarea  readonly="readonly" rows="4" cols="40" >{{$pren->Texto}}</textarea></td><td>{{$pren->ID_Pregunta}}</td>		
                	</tr>
            	@endforeach
            </table>
		</div>
		<div class="col-md-4 col-12">
			<h1>Añadir Diapositiva</h1>
			<a href="{{url('Animaciones/Manage_Crud/addDiapositiva')}}?ID_Presentacion={{$ID_Presentacion}}&Numero_De_diapositiva={{$numeroDiapo}}&TipoDiapo=1">una gran tareas</a> 
		</div>
	</div>

</div>



<div class="p-4"><a href="{{url('/Animaciones/Manage_Crud')}}" class="btn btn-white text-info border-danger">regresar Animaciones Editor <i class="fa fa-hand-point-left"></i></a></div>
@endsection