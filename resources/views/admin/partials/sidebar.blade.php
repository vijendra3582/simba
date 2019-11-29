 @inject('request', 'Illuminate\Http\Request')
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
	<li class="nav-item nav-profile">
	  <a href="#" class="nav-link">
		<div class="nav-profile-image">
		  <img src="{{ url('') }}/{{ Auth::user()->avatar }}" alt="{{ ucwords(strtolower(Auth::user()->name)) }}">
		  <span class="login-status online"></span>
		  <!--change to offline or busy as needed-->
		</div>
		<div class="nav-profile-text d-flex flex-column">
		  <span class="font-weight-bold mb-2">{{ ucwords(strtolower(Auth::user()->name)) }}</span>
		</div>
	  </a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="{{ route('home') }}">
		<span class="menu-title">Dashboard</span>
		<i class="mdi mdi-home menu-icon"></i>
	  </a>
	</li>
	@can('view user')
	<li class="nav-item">
	  <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="{{ $request->segment(1) == 'users' ? 'true' : 'false' }}" aria-controls="ui-basic">
		<span class="menu-title">Users</span>
		<i class="menu-arrow"></i>
		<i class="mdi mdi-account-multiple menu-icon"></i>
	  </a>
	  <div class="collapse {{ $request->segment(1) == 'users' ? 'show' : '' }}" id="users">
		<ul class="nav flex-column sub-menu">
		  @can('create user')
			<li class="nav-item"> <a class="nav-link" href="{{ route('admin.user.create') }}">New User</a></li>
		  @endcan
		  @can('view user')
		  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user') }}">Manage User</a></li>
		  @endcan
		</ul>
	  </div>
	</li>
	@endcan
	@can('view permission')
	<li class="nav-item">
	  <a class="nav-link" data-toggle="collapse" href="#permission" aria-expanded="{{ $request->segment(1) == 'permissions' ? 'true' : 'false' }}" aria-controls="ui-basic">
		<span class="menu-title">Permission</span>
		<i class="menu-arrow"></i>
		<i class="mdi mdi-account-key menu-icon"></i>
	  </a>
	  <div class="collapse {{ $request->segment(1) == 'permissions' ? 'show' : '' }}" id="permission">
		<ul class="nav flex-column sub-menu">
		@can('create permission')
		  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.permission.create') }}">New Permission</a></li>
		@endcan
		@can('view permission')
		  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.permission') }}">Manage Permission</a></li>
		@endcan
		</ul>
	  </div>
	</li>
	@endcan
	@can('view role')
	<li class="nav-item">
	  <a class="nav-link" data-toggle="collapse" href="#role" aria-expanded="{{ $request->segment(1) == 'roles' ? 'true' : 'false' }}" aria-controls="ui-basic">
		<span class="menu-title">Role</span>
		<i class="menu-arrow"></i>
		<i class="mdi mdi-account-check menu-icon"></i>
	  </a>
	  <div class="collapse {{ $request->segment(1) == 'roles' ? 'show' : '' }}" id="role">
		<ul class="nav flex-column sub-menu">
		@can('create role')
		  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role.create') }}">New Role</a></li>
		@endcan
		@can('view role')
		  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role') }}">Manage Role</a></li>
		@endcan
		</ul>
	  </div>
	</li>
	@endcan
  </ul>
</nav>