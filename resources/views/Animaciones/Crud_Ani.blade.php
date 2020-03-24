@extends('layouts.Plantilla_Principal')
@section('content')
<div class="container-fluid m-4 ">
<div class="row">
  <div class="col-md-7 col-12">
    <table border="2px">
      <tr>
        <th>ID presentacion</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Cambiar Nombre /Descripcion</th>
        <th>Editar presentacion</th>
      </tr>
    	@foreach($presentaciones as $pren)
    	<tr>
    		<td>{{$pren->ID_Presentacion}}</td><td>{{$pren->Nombre}}</td><td>{{$pren->Descripcion}}</td><td><a class="btn btn-warning" href="{{url('Animaciones/Manage_Crud/cambiarAni?ID_Presentacion=').$pren->ID_Presentacion}}" >cambiar</a></td><td><a class="btn btn-warning" href="{{url('Animaciones/Manage_Crud/Diapositivas?ID_Presentacion=').$pren->ID_Presentacion}}" >Añadir modificar diapositivas</a></td>		
    	</tr>
    	@endforeach
    </table>
  </div>
   <div class="col-md-4 col-12 border border-gray p-2" >
   	<h3>Crear presentacion</h3>
   	<form action="{{url('Animaciones/Manage_Crud/addPresen')}}" method="post" class="p-2 m-2 bg-success" >
   		@csrf
   		
		<div class="form-group">
			<label for="Nombre">Nombre de la presentación</label>
			<input type="text" class="form-control" id="Nombre" name="Nombre" aria-describedby="Nombre" placeholder="Nombre" required>
		</div>
		<div class="form-group">
			<label for="Descripcion">Descripcion de la prensetación</label>
			<input type="text" class="form-control" id="Descripcion" name="Descripcion" aria-describedby="Descripcion" placeholder="Descripcion" required>
		</div>
		<button class="btn border border-info" type="submit">Crear nueva presentación</button>		
   	</form>
   	<form action="{{url('Animaciones/Manage_Crud/delPren')}}" class="form bg-danger p-2 m-2 text-light">
   		@csrf	
		<h2 class="text-white">Eliminar Presentación</h2>
		<div class="form-group " >
			<label for="ID_Presentacion">ID Presentacion </label>
			
			<select name="ID_Presentacion" class="form-control">
			<option value="null" >
     		</option>
			@foreach($presentaciones as $pren)
			<option value="{{$pren->ID_Presentacion}}">
				{{$pren->ID_Presentacion}} {{$pren->Nombre}}
    		</option>
    		@endforeach 
			</select>
		</div>
		
		<button class="btn btn-info border border-warning" type="submit">Eliminar presentacion</button>		
   	</form>
   	
   </div>
</div>
</div>
@endsection