@extends('layouts.Plantilla_Principal')
@section('content')
<div class="container-fluid text-center justify-content-center ">
<div class="bg-dark container text-light">
	<p>Recurso = Video o Imagen o molecula // si al enviar regresa a esta pagina (No sale) quiere decir que algo salio mal revisa los campos o diselo a Cesar </p>
<p>si subes imagenes en el <b>editor de texto</b> espera que terminen de cargar se vera una border azul arriba de la imagen que te mostrara la carga recuerda que el alto que tiene el marco es aproximado al alto de la diapositiva</p>

	
</div>
<form method="post" class="container" action="{{url('Animaciones/Manage_Crud/addDiapoPost')}}" enctype="multipart/form-data">
<input type="hidden" name="ID_Presentacion" value="{{$ID_Presentacion}}">
	@csrf
	
<input type="hidden" name="TipoDiapo" value="{{$TipoDiapo}}">
<input type="hidden" name="Numero_De_diapositiva" value="{{$Numero_De_diapositiva +1}}">
Nombre Dapositiva
<input type="text"  name="Nombre"class="form-control" required>
@switch($TipoDiapo)
    @case(1)
		<div class=" row text-center  justify-content-center">
    		<h2>Esta diapositiva sera un recurso que ocupa todo el marco - la imagen debe ser lo suficiente mente ancha proporcional a 1024px X 400px,  El video no autoinicia, si subes archivo de molecula No tendra textura de proteina  Proximamente esas opciones-</h2>
        		 <div class="col-12"> 
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
							<option value="SubirMolecula">
								Subir archivo molecula
							</option>
							<option value="Smile">
								Smile
							</option>
							
						</select>
            		</div>
        		</div>
        		<div class="col-12"><h2 class="btn btn-info">Escoje Solo uno dependiendo de la opcion de arriba</h2></div>
				<div class="col-6">
					Url<input type="url" name="urlRecurso" class="form-control">
				</div>
				<div class="col-6">
					Archivo<input type="file" name="Recurso" class="form-control">
				</div>
				<div class="col-6">
					Smile<input type="text" name="Smile" class="form-control">
				</div>
				<div class="col-12 py-2	">		
				</div>
    	@break
	@case(2)
	<div class=" row text-center  justify-content-center">
    		<h2>Esta diapositiva tendra texto en varios formatos que puede contener imagenes te recomindo usar este para subir imagenes y dar formato a texto </h2>
    	<h3>Las imagenes se pueden arrastrar aqui, deberas hubicarlas al final de poner todo el texto la imagen se insertara donde quede el cursor | se pueden poner todas las imagenes que quieras recomendable usar tabla </h3>
    	
    	<div id="TextoAdd"  class="m-0 p-0 w-100 h-100"   Token={{csrf_token()}}>
	    <div>Color de fondo  <input  type="Color" name="bgColor" class="form-control" v-model="bgColor"></div> 
    	   <div >
                <div class="document-editor__toolbar"> </div>
                <div class="document-editor__editable-container bg-white text-dark"  :style="'background-color:'+ bgColor +'!important;' "> 
                    <ckeditor :editor="editor" style="height: 350px;" :config="editorConfig"  @ready="onReady"  name="otro"  v-model="editorData" ref="editor"></ckeditor>
                </div>
    		</div>  
    		<div class="col-12 p-4">
         	 <div class="container-fluid py-3">
   		   	 <button class="btn btn-xs btn-danger" class="form-control"  type="button" v-on:click="CargarDatos">
     	   	 	 pasar a codigo
     	   	</button>Sirve para hacer modificaciones manuales  debes pasar a codigo ya que es lo que se guardara
			</div>
         	<textarea rows="" cols=""  class="form-control" name="Texto" v-model="DatosEditor" required="required"></textarea>
    		
    	</div>
    	</div>    
    </div>

	 @break
	 @case(3)
	 	<h2>Esta diapositiva podras poner un recurso y un texto arriba o a la izquierda</h2>
	 	<div class="row">
	 	<div class="form-group col-4" >
    	 	<label for="posicion" >Localización Recurso</label> 
    	 	<select class="form-control" name="posicion" id="posicion"   require>
    	 		
    	 		<option value="Arriba">Arriba</option>
    	 		<option value="Izquierda">Izquierda</option>
    	 		<option value="Derecha">Derecha</option>
    	 		<option value="Abajo">Abajo</option>
    	 	</select>	 
	 	</div>
	 	<div class="form-group col-8" >
     
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
							<option value="SubirMolecula">
								Subir archivo molecula
							</option>
							<option value="Smile">
								Smile
							</option> 
						</select>
						<div class="col-12"><h2 class="btn btn-info">Escoje Solo uno dependiendo de la opcion de arriba</h2></div>
				<div class="row">
				<div class="col">
					Url<input type="url" name="urlRecurso" class="form-control">
				</div>
				<div class="col">
					Archivo<input type="file" name="Recurso" class="form-control">
				</div>
				<div class="col">
					Smile<input type="text" name="Smile" class="form-control">
				</div>
				<div class="col-12 py-2	">		
				</div>
				</div>
	 	</div>
	 	</div>
	 	</div>
	 	<div class="row">
	 		<div class="col">
					
			</div>
	 	    	<div id="TextoAdd"  class="m-0 p-0 w-100 h-100"   Token={{csrf_token()}}>
	    <div>Color de fondo de toda la diapositiva  <input  type="Color" name="bgColor" class="form-control" v-model="bgColor"></div> 
    	   <div >
                <div class="document-editor__toolbar"> </div>
                <div class="document-editor__editable-container bg-white text-dark"  :style="'background-color:'+ bgColor +'!important;' "> 
                    <ckeditor :editor="editor" style="height: 350px;" :config="editorConfig"  @ready="onReady"  name="otro"  v-model="editorData" ref="editor"></ckeditor>
                </div>
    		</div>  
    		<div class="col-12 p-4">
         	 <div class="container-fluid py-3">
   		   	 <button class="btn btn-xs btn-danger" class="form-control"  type="button" v-on:click="CargarDatos">
     	   	 	 pasar a codigo
     	   	</button>Sirve para hacer modificaciones manuales  debes pasar a codigo ya que es lo que se guardara
			</div>
         	<textarea rows="" cols=""  class="form-control" name="Texto" v-model="DatosEditor" required="required"></textarea>
    		
    	</div>
    	Segundo texto<input type="text" name="texto2" class="form-control">
					<small>Solo sirve para el recurso arriba o abajo ya que este estara en contra parte del primer texto no se permite personalizar siempre sera dark-text (casi negro) </small>
    	</div>    
	 	</div>
	 @break
	 @case(7)
	 	Inserta id Pregunta <input type="number"  name="ID_Pregunta"class="form-control" required>
	 	
	 @break
@endswitch 
    					<button type="submit" class="btn btn-dark">Enviar Diapositiva</button></div>

</form>
</div>
@endsection

