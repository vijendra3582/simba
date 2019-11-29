@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="card-head">
					<h4 class="card-title">{{$title}}</h4>
					<a href="{{ route('admin.permission') }}" class="new-link-table">Manage Permissions</a>
				</div>
				<form action="{{ route('admin.permission.store') }}" method="post">
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
					@if(!$roles->isEmpty())
					<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
						<label for="role">Assign Permission to Roles</label>
						@foreach ($roles as $role)
						<div class="form-checkbox">
							<input type="checkbox" name="roles[]" value="{{$role->id}}" id="role_{{$role->id}}" @if(old('roles')) @if(in_array($role->id, old('roles'))) checked @endif @endif>
							<label for="role_{{$role->id}}">{{ $role->name }}</label>
						</div>
						@endforeach
						@if ($errors->has('roles'))
						<span class="help-block">
							<strong>{{ $errors->first('roles') }}</strong>
						</span>
						@endif
					</div>
					@endif
					<div class="form-group">
						<button type="submit" class="submit-button">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection