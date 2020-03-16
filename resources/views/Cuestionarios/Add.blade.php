@extends('layouts.Plantilla_Principal')
@section('content')
<div id="AddTemas">
 <h1>Temas</h1>
 @can('Ver Temas')
  <div class="container-fluid row pb-5">
  <div class="col-12">
    <b-table striped hover :items="items">
    </b-table>
  </div>
 @can('Editar Temas')
 	<div class="col-6">
 	 <div class="col-12">
 	<h2>Add Temas</h2>
 </div>
	<form action="{{url('SisPreg/Add_Tema')}}" method="post">
		@csrf
          <div class="form-group">
            <label for="Nombre_Tema">Nombre Tema</label>
            <input type="text" class="form-control" id="Nombre_Tema"   placeholder="Nombre_Tema" name="Nombre_Tema">
            <small id="emailHelp" class="form-text text-muted">Tema Posible para un cuestionario o una pregunta</small>
          </div>
          <div class="form-group">
            <label for="Descripcion">Descripcion</label>
            <input type="text" class="form-control" id="Descripcion" placeholder="Descripcion" name="Descripcion">
          </div>
          <div class="form-group">
            <label for="ID_Tema_Prin">ID Tema Principal</label>
            <input type="text" class="form-control" id="Descripcion" placeholder="ID Tema Principal" name="ID_Tema_Prin">
          </div> 
          <button type="submit" class="btn btn-primary">Submit</button>
  
	</form>
	</div>

 	<div class="col-6">
 	<div class="col-12">
 		<h2>Cambiar Tema</h2>
 	</div>
	<form action="{{url('SisPreg/Cambiar_Tema')}}" method="post">
		@csrf
		   <div class="form-group"> 
            <label for="ID_tema">ID Tema</label>
            <input type="text" class="form-control" id="ID_tema"   placeholder="ID_tema" name="ID_tema">
            <small id="emailHelp" class="form-text text-muted">ID del tema Principal</small>
          </div>
          <div class="form-group">
          	
            <label for="Nombre_Tema">Nombre Tema</label>
            <input type="text" class="form-control" id="Nombre_Tema"   placeholder="Nombre_Tema" name="Nombre_Tema">
            <small id="emailHelp" class="form-text text-muted">Tema Posible para un cuestionario o una pregunta</small>
          </div>
          <div class="form-group">
            <label for="Descripcion">Descripcion</label>
            <input type="text" class="form-control" id="Descripcion" placeholder="Descripcion" name="Descripcion">
          </div>
          <div class="form-group">
            <label for="ID_Tema_Prin">ID Tema Principal</label>
            <input type="text" class="form-control" id="Descripcion" placeholder="ID Tema Principal" name="ID_Tema_Prin">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
  
	</form>
	</div>
	 	<div class="col-6">
 	<div class="col-12">
 		<h2>Eliminar Tema</h2>
 	</div>
	<form action="{{url('SisPreg/Eliminar_Tema')}}" method="post">
		@csrf
		   <div class="form-group"> 
            <label for="ID_tema">ID Tema</label>
            <input type="text" class="form-control" id="ID_tema"   placeholder="ID_tema" name="ID_tema">
            <small id="emailHelp" class="form-text text-muted">ID del tema Principal</small>
          </div> 
          <button type="submit" class="btn btn-primary">Eliminar</button> 
	</form>
	</div>
	
	
	
 @endcan
</div>
 @endcan
</div>


<hr>


<div id="Cuestionario">
 @can('Ver Cuestionarios')
  <div class="container-fluid row pb-5">
  <div class="col-12">
  <h1>Presentaciones</h1>
    <b-table striped hover :items="items">
    </b-table>
  </div>
 @can('Editar Cuestionarios') 
 	<div class="col-6">
 	 <div class="col-12">
 	<h2>Add Cuestionario</h2>
 </div>
	<form action="{{url('SisPreg/Add_Cuestionario')}}" method="post">
		@csrf
  
          <div class="form-group">
            <label for="NombreCuestionario">NombreCuestionario</label>
            <input type="text" class="form-control" id="NombreCuestionario" placeholder="Descripcion" name="NombreCuestionario">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
  
	</form>
	
	</div>
	
 	<div class="col-6">
 	<div class="col-12">
 		<h2>Cambiar  Presentacion</h2>
 	</div>
	<form action="{{url('SisPreg/Cambiar_Cuestionario')}}" method="post">
		@csrf
		   <div class="form-group"> 
            <label for="ID_tema">ID Presentacion</label>
            <input type="text" class="form-control" id="ID_Cuestionario"   placeholder="ID_Cuestionario" name="ID_Cuestionario">
            <small id="emailHelp" class="form-text text-muted">ID del tema Principal</small>
          </div>
          <div class="form-group">
            <label for="NombreCuestionario">Nombre Cuestionario</label>
            <input type="text" class="form-control" id="NombreCuestionario" placeholder="Descripcion" name="NombreCuestionario">
          </div> 
          <button type="submit" class="btn btn-primary">Submit</button>
  
	</form>
	</div>
	 	<div class="col-6">
 	<div class="col-12">
 		<h2>Eliminar Presentaciones</h2>
 	</div>
	<form action="{{url('SisPreg/Eliminar_Cuestionario')}}" method="post">
		@csrf
	   <div class="form-group"> 
            <label for="ID_tema">ID Cuestionario</label>
            <input type="text" class="form-control" id="ID_Cuestionario"   placeholder="ID_Cuestionario" name="ID_Cuestionario">
            <small id="emailHelp" class="form-text text-muted">ID del tema Principal</small>
       </div> 
          <button type="submit" class="btn btn-primary">Eliminar</button> 
	</form>
	</div>
	
	
	
	
	
	
	
	
	
	
 @endcan
</div>
 @endcan

</div>
<hr>

<div id="tipo_resps">
 @can('Ver Cuestionarios')
  <div class="container-fluid row pb-5">
  <div class="col-12">
  <h1>Tipo Diapositivas</h1>
    <b-table striped hover :items="items">
    </b-table>
  </div>
 @can('Editar Cuestionarios') 
 	<div class="col-6">
 	 <div class="col-12">
 	<h2>Add Tipo Dipositivas</h2>
 </div>
	<form action="{{url('SisPreg/Add_tipo_resps')}}" method="post">
		@csrf 
          <div class="form-group">
            <label for="Tipo">Nombre Tipo</label>
            <input type="text" class="form-control" id="Tipo" placeholder="Tipo" name="Tipo">
          </div> 
          <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
 	<div class="col-6">
 	<div class="col-12">
 		<h2>Cambiar Tipo</h2>
 	</div>
	<form action="{{url('SisPreg/Cambiar_tipo_resps')}}" method="post">
		@csrf
		   <div class="form-group"> 
            <label for="ID_TipoRespuesta">ID Tipo</label>
            <input type="text" class="form-control" id="ID_TipoRespuesta"   placeholder="ID_TipoRespuesta" name="ID_TipoRespuesta">
           </div>
          <div class="form-group">
            <label for="Tipo">Nombre Tipo</label>
            <input type="text" class="form-control" id="Tipo" placeholder="Tipo" name="Tipo">
          </div> 
          <button type="submit" class="btn btn-primary">Submit</button>
  
	</form>
	</div>
	 	<div class="col-6">
 	<div class="col-12">
 		<h2>Eliminar tipo</h2>
 	</div>
	<form action="{{url('SisPreg/Eliminar_tipo_resps')}}" method="post">
		@csrf
	   <div class="form-group"> 
            <label for="ID_TipoRespuesta">ID Tipo</label>
            <input type="text" class="form-control" id="ID_TipoRespuesta"   placeholder="ID_TipoRespuesta" name="ID_TipoRespuesta">
        </div> 
          <button type="submit" class="btn btn-primary">Eliminar</button> 
	</form>
	</div> 	
	
 @endcan
</div>
 @endcan
 </div>


@endsection