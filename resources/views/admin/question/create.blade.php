@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="card-head">
					<h4 class="card-title">{{$title}}</h4>
					<a href="{{ route('admin.question') }}" class="new-link-table">Manage Questions</a>
				</div>
				<form action="{{ route('admin.question.store') }}" method="post">
					@csrf
					<div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
						<label for="question">Question</label>
						<input type="text" name="question" class="form-control" value="{{ old('question') }}" id="question">
						@if ($errors->has('question'))
						<span class="help-block">
							<strong>{{ $errors->first('question') }}</strong>
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