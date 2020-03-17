@extends('layouts.Plantilla_Principal') @section('content')
<p>
	<b>{{$Cuestionario}}</b>
</p>
<div>Añadir Diapositiva</div>
<div id="Preguntas" ID_Cuestionario="{{$Cuestionario->ID_Cuestionario}}" class="pb-5">
<div class="row">
	<div class="col-11">	
		<b-table striped hover :items="items"> </b-table>
	</div>
</div>
 <div class="row">
 <div class="col-6">
 <form action="{{url('SisPreg/AddPreguntaTodo')}}" method="post">
	@csrf
  <input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
  <div class="form-group">
    <label for="Enunciado">Enunciado</label>
    <input type="text" class="form-control" id="Enunciado" name="Enunciado" aria-describedby="Enunciado" placeholder="Enunciado" required>
  </div>
  <div class="form-group">
    <label for="Retro_Alimentacion">Retro Alimentacion 	</label>
    <input type="text" class="form-control" id="Retro_Alimentacion" name="Retro_Alimentacion" aria-describedby="Retro_Alimentacion" placeholder="Retro_Alimentacion">
  </div>
   <div class="form-group">
    <label for="ID_NumPegunta">Numero Dipositiva 	</label>
    <input type="number" class="form-control" id="ID_NumPegunta" name="ID_NumPegunta" aria-describedby="ID_NumPegunta" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="ID_Tipo_Respuesta">Tipo Diapositiva</label>
    <select name="ID_Tipo_Respuesta" id="ID_Tipo_Respuesta" class="form-control" required>
        @foreach($tipo_resps as $Tipo)
     		<option value="{{$Tipo->ID_TipoRespuesta}}">{{$Tipo->Tipo}}</option> 
    	@endforeach  
    </select>  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="col-6">
	<div class="col-12">
		<form  action="{{url('SisPreg/ElimnarRelacionPregunta')}}" method="post">
			@csrf
			<input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
    		Eliminar
 			<div class="form-group">
    		<label for="ID_Pregunta">ID Pregunta 	</label>
    		<input type="number" class="form-control" id="ID_Pregunta" name="ID_Pregunta" aria-describedby="ID_Pregunta" placeholder="ID_Pregunta" required>
  			</div>
  	  		<button type="submit" class="btn btn-primary">Submit</button>
  		</form>
	</div>
	<div class="col-12">
			<form  action="{{url('SisPreg/Crear_Respuestas')}}" method="get" >
    			@csrf
    			<input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
    			<label for="ID_Pregunta">ID Pregunta 	</label>
    			<input type="number" class="form-control" id="ID_Pregunta" name="ID_Pregunta" aria-describedby="ID_Pregunta" placeholder="ID_Pregunta" required>
  	  		<button type="submit" class="btn btn-primary">Crear Respuesta</button>

			</form>
	</div>
	
	
</div>

</div> 
</div>
@endsection
