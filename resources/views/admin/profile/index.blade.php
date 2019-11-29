@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>
                <p class="card-description"></p>
                <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ auth::user()->name }}" placeholder="Admin">
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
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
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="name">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ auth::user()->email }}" placeholder="admin@example.com">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Profile" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title2 }}</h4>
                <p class="card-description"></p>
                <form action="{{ route('admin.password.update') }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="********">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="********">
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Update Password" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.already-uploaded {
    float: left;
    width: 100%;
    margin: 2rem 0;
}
textarea#site_embroidery_description {
    height: 132px;
}
</style>
@endsection