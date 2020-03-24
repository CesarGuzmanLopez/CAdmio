@extends('layouts.admin')
@section('content')
 <div class="row">
	<div class="content">
        <div class="col-lg-12">
        	<h1><a href="{{url('Animaciones/Manage_Crud/')}}">Nuevo Sistema de Animaciones</h1>
        	<h2 class="bg-success"><a href="{{url('/SisPreg')}}">Antiguo Sistema Animaciones</a></h2>
            <h1><a href="{{url('/')}}">Presentaciones</a></h1>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection