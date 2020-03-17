@extends('layouts.Plantilla_Principal')
@section('content')
<div class="pb-5">
@switch($Pregunta->Tipo)
@case('Pregunta')
	<div class="Respuestas_Pregunta" id="Crear_Respuestas" ID_Pregunta="{{$Pregunta->ID_Pregunta}}">	
		<div class="col-11">	
		<b-table striped hover :items="items"> </b-table>
	</div>
 <form action="{{url('SisPreg/AddRespuestaTodo')}}" method="post">
	@csrf
  <input type="hidden" name="ID_Pregunta" value="{{$Pregunta->ID_Pregunta}}">
  <input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
  <div class="form-group">
    <label for="Respuesta">Respuesta</label>
    <input type="text" class="form-control" id="Respuesta" name="Respuesta" aria-describedby="Respuesta" placeholder="Enunciado" required>
  </div> 
   <div class="form-group">
    <label for="Numero">Numero Respuesta 	</label>
    <input type="number" class="form-control" id="Numero" name="Numero" aria-describedby="Numero" placeholder="Numero" required>
  </div>
  <div class="form-group">
    <label for="Correcta">Corecta</label>
    <select name="Correcta" id="Correcta" class="form-control" required>
     		<option value="0">No</option> 
    		<option value="1">Si</option> 
    </select>  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<form  action="{{url('SisPreg/ElimnarRelacionRespuesta')}}" method="post">
			@csrf
			  <input type="hidden" name="ID_Pregunta" value="{{$Pregunta->ID_Pregunta}}">
          <input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
          Eliminar
 			<div class="form-group">
    		<label for="ID_Respuesta">ID Respuesta	</label>
    		<input type="number" class="form-control" id="ID_Respuesta" name="ID_Respuesta" aria-describedby="ID_Respuesta" placeholder="ID_Respuesta" required>
  			</div>
  	  		<button type="submit" class="btn btn-primary">Submit</button>
  		</form>
	</div>
  @break
@case ("Recurso")
    @if (!$Pregunta->Recurso)  
		Esta accion eliminara el recurso anterior existe
	@endif	
    <form method="POST" action="{{Url('SisPreg/SubirRecurso')}}" accept-charset="UTF-8" enctype="multipart/form-data">
          <div class="form-group">
          @csrf
			<input type="hidden" name="ID_Pregunta" value="{{$Pregunta->ID_Pregunta}}">
          	<input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
            <label for="Recurso">Recruso</label>
            <input type="file" class="form-control" id="Recurso" name="Recurso" aria-describedby="File recurso" required>
          </div>    	
  	  		<button type="submit" class="btn btn-primary">Añadir recurso</button>
    </form>
  @break
@case("Recurso Con Pregunta")
    
<div class="Respuestas_Pregunta" id="Crear_Respuestas" ID_Pregunta="{{$Pregunta->ID_Pregunta}}">
	
    
   <b-table striped hover :items="items"> </b-table>
    
   
 <form action="{{url('SisPreg/AddRespuestaTodo')}}" method="post">
	@csrf
  <input type="hidden" name="ID_Pregunta" value="{{$Pregunta->ID_Pregunta}}">
  <input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
  <div class="form-group">
    <label for="Respuesta"><h1>Nueva Respuesta</h1></label>
    <input type="text" class="form-control" id="Respuesta" name="Respuesta" aria-describedby="Respuesta" placeholder="Enunciado" required>
  </div> 
   <div class="form-group">
    <label for="Numero">Numero Respuesta 	</label>
    <input type="number" class="form-control" id="Numero" name="Numero" aria-describedby="Numero" placeholder="Numero" required>
  </div>
  <div class="form-group">
    <label for="Correcta">Corecta</label>
    <select name="Correcta" id="Correcta" class="form-control" required>
     		<option value="0">No</option> 
    		<option value="1">Si</option> 
    </select>  
  </div>
  <button type="submit" class="btn btn-primary">Nueva Respuesta</button>
</form>
<form  action="{{url('SisPreg/ElimnarRelacionRespuesta')}}" method="post">
			@csrf
			  <input type="hidden" name="ID_Pregunta" value="{{$Pregunta->ID_Pregunta}}">
          <input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
          <h1>Eliminar</h1>
 			<div class="form-group">
    		<label for="ID_Respuesta">ID Respuesta	</label>
    		<input type="number" class="form-control" id="ID_Respuesta" name="ID_Respuesta" aria-describedby="ID_Respuesta" placeholder="ID_Respuesta" required>
  			</div>
  	  		<button type="submit" class="btn btn-primary">Eliminar Respuesta</button>
  		</form>

<hr>    


    
    <form method="POST" action="{{Url('SisPreg/SubirRecurso')}}" accept-charset="UTF-8" enctype="multipart/form-data">
          <div class="form-group">
          @csrf
			<input type="hidden" name="ID_Pregunta" value="{{$Pregunta->ID_Pregunta}}">
          	<input type="hidden" name="ID_Cuestionario" value="{{$Cuestionario->ID_Cuestionario}}">
            <label for="Recurso"><h1>Recruso</h1></label>
            <input type="file" class="form-control" id="Recurso" name="Recurso" aria-describedby="File recurso" required>
          </div>    	
  	  		<button type="submit" class="btn btn-primary">Añadir recurso</button>
    </form>


  </div>
  @break
@case("Texto Con Pregunta")
		
@break
@case("Texto")
	

  @break 
@endswitch

  

</div>
@endsection
