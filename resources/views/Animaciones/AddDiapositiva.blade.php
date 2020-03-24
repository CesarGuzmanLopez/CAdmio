@extends('layouts.Plantilla_Principal')
@section('content')
<div class="container-fluid text-center justify-content-center ">
<div class="bg-dark container text-light">
	Recurso = Video o Imagen // si al enviar regresa quiere decir que algo salio mal revisa los campos o diselo a Cesar
</div>
<form method="post" class="container" action="{{url('Animaciones/Manage_Crud/addDiapoPost')}}" enctype="multipart/form-data">
<input type="hidden" name="ID_Presentacion" value="{{$ID_Presentacion}}">
<input type="hidden" name="TipoDiapo" value="{{$TipoDiapo}}">
<input type="hidden" name="Numero_De_diapositiva" value="{{$Numero_De_diapositiva +1}}">

@switch($TipoDiapo)
    @case(1)
		<div class=" row text-center  justify-content-center">
    		<h1>Esta diapositiva sera un recurso que ocupa todo el marco</h1>
        		 <div class="col-12">
    					@csrf
    					<div class="form-group">
                			<label for="tipoLocacion">Tipo Recurso</label>
							<select name="tipoLocacion" class="form-control">
								<option value="urlImage">
									Url de imagen
								</option>
								<option value="urlVideo">
									url de video 
								</option>
								<option value="subirImagen">
									Subir imagen
								</option>
								<option value="SubirVideo">
									Subir Video
								</option>
							</select>
                		</div>
                		</div>
                		<div class="col-12">Solo uno</div>
    					<div class="col-6">
    						Url<input type="url" name="urlRecurso" class="form-control">
    					</div>
    					<div class="col-6">
    						Archivo<input type="file" name="Recurso" class="form-control">
    					</div>
    					<div class="col-12 py-2	">		
		</div>
    	@break
    

@endswitch


    					<button type="submit" class="btn btn-dark">Enviar Diapositiva</button></div>

</form>
</div>
@endsection

