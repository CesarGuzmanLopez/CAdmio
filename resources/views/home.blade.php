@extends('layouts.admin')
@section('content')
    <div class="row">
<div class="content">
        <div class="col-lg-12">
        	<h1><a href="{{url('/SisPreg')}}">Sistema de Preguntas</a></h1>
            <h1><a href="{{url('/ani')}}">animaciones</a></h1>
            <h1><a href="{{url('/')}}">Presentaciones</a></h1>
        
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection