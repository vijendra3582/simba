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
				<p class="card-description"></p>
				<form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="role" value="user">
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
						<label for="contact">Contact No.</label>
						<input type="text" name="contact" class="form-control" value="{{ old('contact') }}" id="contact">
						@if ($errors->has('contact'))
						<span class="help-block">
							<strong>{{ $errors->first('contact') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email">
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
						<label for="city">City</label>
						<input type="text" name="city" class="form-control" value="{{ old('city') }}" id="city">
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
					</div>
					<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
						<label for="dob">Date Of Birth</label>
						<input type="date" name="dob" class="form-control" value="{{ date('Y-m-d', strtotime(old('dob'))) }}" id="dob">
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
								<option value="{{ $question->id }}" @if($question->id == old('security_question_id')) selected @endif>{{ $question->question }}</option>
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
						<input type="text" name="security_question_answer" class="form-control" value="{{ old('security_question_answer') }}" id="security_question_answer">
						@if ($errors->has('security_question_answer'))
						<span class="help-block">
							<strong>{{ $errors->first('security_question_answer') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password">Password</label>
						<input id="password" type="password" class="form-control" name="password">
						@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="password-confirm">Confirm Password</label>
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
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