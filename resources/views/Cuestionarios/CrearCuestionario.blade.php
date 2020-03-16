@extends('layouts.Plantilla_Principal') @section('content')
<p>
	<b>{{$Cuestionario}}</b>
</p>
<div>Añadir Pregunta</div>
<div id="Preguntas" ID_Cuestionario="{{$Cuestionario->ID_Cuestionario}}" class="pb-5">
<div class="row">
	<div class="col-11">	
		<b-table striped hover :items="items"> </b-table>
	</div>
</div>

 <div class="row">
 <div class="col-6">
 <form>


  <div class="form-group">
    <label for="Enunciado">Enunciado</label>
    <input type="text" class="form-control" id="Enunciado" name="Enunciado" aria-describedby="Enunciado" placeholder="Enunciado">
  </div>  
  <div class="form-group">
    <label for="Recurso">Recurso</label>
    <input type="text" class="form-control" id="Recurso" name="Recurso" aria-describedby="Recurso" placeholder="Recurso">
  </div>
    <div class="form-group">
    <label for="Retro_Alimentacion">Retro Alimentacion 	</label>
    <input type="text" class="form-control" id="Retro_Alimentacion" name="Retro_Alimentacion" aria-describedby="Retro_Alimentacion" placeholder="Retro_Alimentacion">
  </div>
  
  <div class="form-group">
    <label for="ID_Tipo_Respuesta">Tipo Respuesta</label>
    <input type="text" class="form-control" id="ID_Tipo_Respuesta" name="ID_Tipo_Respuesta" aria-describedby="ID_Tipo_Respuesta" placeholder="ID_Tipo_Respuesta">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
 
</div> 
</div>
@endsection
