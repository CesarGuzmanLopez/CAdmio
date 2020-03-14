@extends('layouts.Plantilla_Principal')
@section('content') 
@can('Usuario')
<div  class="container-fluid row justify-content-center">
	<div class="col-8 p-2 mt-4 ">
		<div id="AUX" >
	 		<Ani1></Ani1>
		</div>
	</div>	
</div>
@endcan
@endsection
