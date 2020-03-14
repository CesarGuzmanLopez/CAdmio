<div id="Menu"> 
	@can('Usuario')
	<a href='{{ route("admin.home") }}'> 
		<i class="nav-icon fas fa-fw fa-tachometer-alt"> </i> {{ trans('global.dashboard') }}
	</a> 
	@can('users_manage')
	 <a href='{{ route("admin.permissions.index") }}'> 
	 	<i class="fa-fw fas fa-unlock-alt nav-icon"> </i> {{trans('cruds.permission.title') }}
	 </a> 
	 <a href='{{ route("admin.roles.index") }}'> 
	 	<i	class="fa-fw fas fa-briefcase nav-icon"> </i> {{	trans('cruds.role.title') }}
	 </a> 
	 <a href='{{ route("admin.users.index") }}'> 
	 	<i	class="fa-fw fas fa-user nav-icon"> </i> {{ trans('cruds.user.title')}}
	</a> 
	@endcan {{--fin de user manager --}}
	<a href='{{ route("auth.change_password") }}'> 
		<i	class="nav-icon fas fa-fw fa-key"> </i> Change password
	</a>
	<a href='{{url("/cerrarSesion")}}'> <i class="nav-icon fas fa-fw fa-sign-out-alt"> </i> Cerrar Sésion
	
	</a> 
	@endcan {{--fin de Usuario --}}
</div>