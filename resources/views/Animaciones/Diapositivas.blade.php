@extends('layouts.Plantilla_Principal')
@section('content')
<?php $numeroDiapo =0;
?>
<div class="p-4"><a href="{{url('/Animaciones/Manage_Crud')}}" class="btn btn-white text-info border-danger">regresar Animaciones Editor <i class="fa fa-hand-point-left"></i></a></div>
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
                <th>Cambiar diapositiva</th>
              </tr>
            	@foreach($diapositivas as $pren)
					<?php $numeroDiapo = $pren->Numero_De_diapositiva;?>
                	<tr>
                		<td>{{$pren->ID_Dispositiva}}</td><td>{{$pren->Numero_De_diapositiva}}</td><td>{{$pren->Nombre}}</td><td><textarea  readonly="readonly" rows="4" cols="40" >{!!$pren->Texto!!}</textarea></td><td>{{$pren->ID_Pregunta}}</td><td>			<a href="{{url('Animaciones/Manage_Crud/cahngeDiapo')}}?ID_Dispositiva={{$pren->ID_Dispositiva}}" class="btn btn-info">Cambiar</a></td>		
                	</tr>
            	@endforeach
            </table>
		</div>
		<div class="col-md-4 col-12 bg-white">
		<h1>Agregar diapositiva</h1>
			<h2>Solo recurso "Imagen"  "video" "molecula 3D"</h2>
			<a href="{{url('Animaciones/Manage_Crud/addDiapositiva')}}?ID_Presentacion={{$ID_Presentacion}}&Numero_De_diapositiva={{$numeroDiapo}}&TipoDiapo=1">Solo recurso "Imagen"  "video" "molecula 3D"</a> 
			<h2>Texto personalizado</h2>
			<a href="{{url('Animaciones/Manage_Crud/addDiapositiva')}}?ID_Presentacion={{$ID_Presentacion}}&Numero_De_diapositiva={{$numeroDiapo}}&TipoDiapo=2">Texto personalizado</a> 
			<h2>Texto con recurso</h2>
			<a href="{{url('Animaciones/Manage_Crud/addDiapositiva')}}?ID_Presentacion={{$ID_Presentacion}}&Numero_De_diapositiva={{$numeroDiapo}}&TipoDiapo=3">Texto con recurso</a>
			<h2>Solo pregunta</h2>
			<a href="{{url('Animaciones/Manage_Crud/addDiapositiva')}}?ID_Presentacion={{$ID_Presentacion}}&Numero_De_diapositiva={{$numeroDiapo}}&TipoDiapo=7">Solo Pregunta</a>
			
			<form action="{{url('Animaciones/Manage_Crud/eliminarDiapo')}}" class="form bg-danger p-2 m-2 text-light">
           		@csrf	
        		<h2 class="text-white">Eliminar Diapositiva</h2>
        		<div class="form-group " >
        			<label for="ID_Dispositiva">ID Diapositiva </label> 
        			<select name="ID_Dispositiva" class="form-control">
        			<option value="null" >
             		</option> 
            	     @foreach($diapositivas as $pren)
						<?php $numeroDiapo = $pren->Numero_De_diapositiva;?>
                    	<option value="{{$pren->ID_Dispositiva}}"> 
                    			{{$pren->ID_Dispositiva}} {{$pren->Nombre}}		
                    	</option>
        			@endforeach 
        			</select>
        		</div> 	
        		<button class="btn btn-info border border-warning" type="submit">Eliminar Diapositiva</button>		
           	</form>


		</div>
	 
	</div>

</div>



@endsection