@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="card-headers">
					<span class="new-header-table">{{ $title }}</span>
					<a href="{{ route('admin.user') }}" class="new-link-table">Manage Users</a>
				</div>
				<form action="{{ route('admin.user.update') }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<input type="hidden" name="id" value="{{ $user->id }}">
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
						<label for="contact">Contact No.</label>
						<input type="text" name="contact" class="form-control" value="{{ $user->contact }}" id="contact">
						@if ($errors->has('contact'))
						<span class="help-block">
							<strong>{{ $errors->first('contact') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" value="{{ $user->email }}" id="email" disabled>
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
						<label for="city">City</label>
						<input type="text" name="city" class="form-control" value="{{ $user->city }}" id="city">
						@if ($errors->has('city'))
						<span class="help-block">
							<strong>{{ $errors->first('city') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                        <label for="name">Avatar</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                        @if ($errors->has('avatar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                        @endif
                        @if(auth::user()->avatar)
                        <div class="already-uploaded">
                            <img src="{{ URL::to(auth::user()->avatar) }}" alt="{{ auth::user()->name }}" width="200" height="200">
                        </div>
                        @endif
					</div>
					<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
						<label for="dob">Date Of Birth</label>
						<input type="date" name="dob" class="form-control" value="{{ date('Y-m-d', strtotime($user->dob)) }}" id="dob">
						@if ($errors->has('dob'))
						<span class="help-block">
							<strong>{{ $errors->first('dob') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('security_question_id') ? ' has-error' : '' }}">
						<label for="security_question_id">Security Question</label>
						<select name="security_question_id" id="security_question_id" class="form-control select2">
							<option value="">Select Question</option>
							@foreach($questions as $question)
								<option value="{{ $question->id }}" @if($question->id == $user->security_question_id) selected @endif>{{ $question->question }}</option>
							@endforeach
						</select>
						@if ($errors->has('security_question_id'))
						<span class="help-block">
							<strong>{{ $errors->first('security_question_id') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('security_question_answer') ? ' has-error' : '' }}">
						<label for="security_question_answer">Answer</label>
						<input type="text" name="security_question_answer" class="form-control" value="{{ $user->security_question_answer }}" id="security_question_answer">
						@if ($errors->has('security_question_answer'))
						<span class="help-block">
							<strong>{{ $errors->first('security_question_answer') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<button type="submit" class="submit-button">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection