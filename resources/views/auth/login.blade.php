@extends('layouts.app')@section('title', 'Login to your account')
@section('content')
<div class="form">
   <h1>Login to your account</h1>
   <div id="infoMessage"></div>
   <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
         <label for="email">E-Mail Address</label>
         <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
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
         <input type="submit" name="submit" value="Login" />
      </div>
   </form>
</div>
@endsection