@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="card-head">
					<h4 class="card-title">{{$title}}</h4>
					<a href="{{ route('admin.role') }}" class="new-link-table">Manage Roles</a>
				</div>
				<form action="{{ route('admin.role.store') }}" method="post">
					@csrf
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class='form-group'>
						<label for="permission">Assign Permissions</label>
						@foreach ($permissions as $permission)
						<div class="form-checkbox">
							<input type="checkbox" name="permissions[]" value="{{$permission->id}}" id="permission_{{$permission->id}}" @if(old('permissions')) @if(in_array($permission->id, old('permissions'))) checked @endif @endif>
							<label for="permission_{{$permission->id}}">{{ $permission->name }}</label>
						</div>
						@endforeach
						@if ($errors->has('permissions'))
						<span class="help-block">
							<strong>{{ $errors->first('permissions') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<button type="submit" class="submit-button">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection