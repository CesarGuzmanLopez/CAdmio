<div id="Menu"> 

<nav class="navbar navbar-expand-md navbar-light  bg-white border-info border-bottom">
@can('Usuario')
  <a class="navbar-brand text-info" href="{{url('/')}}">Talio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 <div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
	@cannot('Invitado')
	<a class="nav-link" href='{{ route("admin.home") }}'> 
		<i class="nav-icon fas fa-fw fa-tachometer-alt"> </i> {{ trans('global.dashboard') }}
	</a>
	@endcannot
	@can('users_manage')
	 <li class="nav-item active">
	 <a class="nav-link" href='{{ route("admin.permissions.index") }}'> 
	 	<i class="fa-fw fas fa-unlock-alt nav-icon"> </i> {{trans('cruds.permission.title') }}
	 </a> 
	 </li>
	 <li class="nav-item active">
	 <a class="nav-link" href='{{ route("admin.roles.index") }}'> 
	 	<i	class="fa-fw fas fa-briefcase nav-icon"> </i> {{	trans('cruds.role.title') }}
	 </a> 
	 </li>
	 <li class="nav-item active">
	 <a class="nav-link" href='{{ route("admin.users.index") }}'> 
	 	<i	class="fa-fw fas fa-user nav-icon"> </i> {{ trans('cruds.user.title')}}
	</a> 
	</li>
	@endcan {{--fin de user manager --}}
	@cannot('Invitado')
	 <li class="nav-item active">
	<a class="nav-link" href='{{ route("auth.change_password") }}'> 
		<i	class="nav-icon fas fa-fw fa-key"> </i> Change password
	</a>
	</li>
	@endcannot
		 <li class="nav-item active">
	
	<a  class="nav-link" href='{{url("/cerrarSesion")}}'> 
		<i class="nav-icon fas fa-fw fa-sign-out-alt"> </i> Cerrar Sésion
	</a>
	</li>
	@endcan {{--fin de Usuario --}}
</ul>

</div>



</nav> 

</div>