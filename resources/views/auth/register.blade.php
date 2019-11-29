@extends('layouts.app')
@section('title', 'Create an account')
@section('content')
<div class="form">
<h1>Create an account</h1>
	<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
		{{ csrf_field() }}

		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name">Name</label>
				<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

				@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
		</div>

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email">E-Mail Address</label>

				<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
		</div>

		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label for="password">Password</label>

				<input id="password" type="password" class="form-control" name="password" required>

				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
		</div>

		<div class="form-group">
			<label for="password-confirm">Confirm Password</label>

				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		</div>

		<div class="form-group">
				<input name="submit" value="Register" type="submit">
		</div>
		
		<div class="form-group">

        <a href="{{ route('login') }}">

        Already have an account ?

        </a>

      </div>
	</form>
</div>
@endsection
