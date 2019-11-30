@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="card-head">
					<h4 class="card-title">{{$title}}</h4>
					<a href="{{ route('admin.category') }}" class="new-link-table">Manage Categories</a>
				</div>
				<form action="{{ route('admin.category.store') }}" method="post">
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
					<div class="form-group">
						<button type="submit" class="submit-button">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection