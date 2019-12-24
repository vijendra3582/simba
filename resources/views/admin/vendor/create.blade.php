@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="card-headers">
					<span class="new-header-table">{{ $title }}</span>
					<a href="{{ route('admin.vendor') }}" class="new-link-table">Manage Vendors</a>
				</div>
				<p class="card-description"></p>
				<form action="{{ route('admin.vendor.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="role" value="vendor">
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
					<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
						<label for="category_id">Category</label>
						<select name="category_id" id="category_id" class="form-control select2">
							<option value="">Select Category</option>
							@foreach($category as $cat)
							<option value="{{ $cat->id }}" @if($cat->id == old('category_id')) selected @endif>{{ $cat->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('category_id'))
						<span class="help-block">
							<strong>{{ $errors->first('category_id') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }}">
						<label for="designation_id">Designation</label>
						<select name="designation_id" id="designation_id" class="form-control select2">
							<option value="">Select Designation</option>
							@foreach($designation as $deg)
							<option value="{{ $deg->id }}" @if($deg->id == old('designation_id')) selected @endif>{{ $deg->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('designation_id'))
						<span class="help-block">
							<strong>{{ $errors->first('designation_id') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
						<label for="discount">Discount</label>
						<input id="discount" type="number" class="form-control" name="discount" value="{{ old('discount') }}">
						@if ($errors->has('discount'))
						<span class="help-block">
							<strong>{{ $errors->first('discount') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('registration_tenure') ? ' has-error' : '' }}">
						<label for="registration_tenure">Registration Tenure</label>
						<input id="registration_tenure" type="text" class="form-control" name="registration_tenure" value="{{ old('registration_tenure') }}">
						@if ($errors->has('registration_tenure'))
						<span class="help-block">
							<strong>{{ $errors->first('registration_tenure') }}</strong>
						</span>
						@endif
					</div>
					<hr>
					<div class="form-group{{ $errors->has('registration_details') ? ' has-error' : '' }}">
						<label for="registration_details">Registration Details</label>
						<div class="append-div">
							<div class="append-div-div">
								<div class="form-group-half">
									<label for="registration_details_title">File Name</label>
									<input id="registration_details_title" type="text" class="form-control" name="registration_details_title[]">
								</div>
								<div class="form-group-half">
									<label for="registration_details_title">File</label>
									<input id="registration_details_title" type="file" class="form-control" name="registration_details_file[]">
								</div>
							</div>
							<span class="button-chota" onclick="addMore()"> &plus; </span>
						</div>
						<div class="append-here">

						</div>
						@if ($errors->has('registration_details_title'))
						<span class="help-block">
							<strong>{{ $errors->first('registration_details_title') }}</strong>
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
<script type="text/javascript">
	function addMore() {
		var html = '<div class="append-here-div">';
		html += $('.append-div-div').html();
		html += '<span class="button-chota" onclick="$(this).parent().remove()"> &times; </span>';
		html += '</div>';
		$('.append-here').append(html);
	}
</script>
@endsection