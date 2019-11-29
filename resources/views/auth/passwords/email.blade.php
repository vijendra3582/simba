@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
<div class="form">
      <h1>Forgot Password</h1>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                                <input type="submit" name="submit" value="Submit">
                        </div>
                        <div class="form-group">
        <a href="{{ route('login') }}">
        Got your password ?
        </a>
      </div>
                    </form>
</div>
@endsection
