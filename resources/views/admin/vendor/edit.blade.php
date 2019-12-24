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
				<form action="{{ route('admin.vendor.update') }}" method="post" enctype="multipart/form-data">
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
					<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
						<label for="category_id">Category</label>
						<select name="category_id" id="category_id" class="form-control select2">
							<option value="">Select Category</option>
							@foreach($category as $cat)
							<option value="{{ $cat->id }}" @if($cat->id == $user->vendor->category_id) selected @endif>{{ $cat->name }}</option>
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
							<option value="{{ $deg->id }}" @if($deg->id == $user->vendor->designation_id) selected @endif>{{ $deg->name }}</option>
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
						<input id="discount" type="number" class="form-control" name="discount" value="{{ $user->vendor->discount }}">
						@if ($errors->has('discount'))
						<span class="help-block">
							<strong>{{ $errors->first('discount') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('registration_tenure') ? ' has-error' : '' }}">
						<label for="registration_tenure">Registration Tenure</label>
						<input id="registration_tenure" type="text" class="form-control" name="registration_tenure" value="{{ $user->vendor->registration_tenure }}">
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

							@foreach($user->vendor->registration_details as $key => $value)
							<div class="append-div-div">
								<div class="form-group-half">
									<label for="registration_details_title">File Name</label>
									<input id="registration_details_title" type="text" class="form-control" name="registration_details_title[]" value="{{ $value['title'] }}" readonly>
								</div>
								<div class="form-group-half">
									<label for="registration_details_title">File (<a href="{{ URL::to($value['file']) }}" target="_blank">View</a>)</label>
									<input id="registration_details_title" type="text" class="form-control" name="registration_details_file[]" value="{{ $value['file'] }}" readonly>
								</div>
								<span class="button-chota" onclick="$(this).parent().remove()"> &times; </span>
							</div>
							@endforeach
						</div>
						<div class="append-div-div-edit dd-none">
							<div class="form-group-half">
								<label for="registration_details_title">File Name</label>
								<input id="registration_details_title" type="text" class="form-control" name="registration_details_title_name[]">
							</div>
							<div class="form-group-half">
								<label for="registration_details_title">File</label>
								<input id="registration_details_title" type="file" class="form-control" name="registration_details_file_name[]">
							</div>
						</div>
						<span class="button-chota" onclick="addMore()"> &plus; </span>
						<div class="append-here">

						</div>
						@if ($errors->has('registration_tenure'))
						<span class="help-block">
							<strong>{{ $errors->first('registration_tenure') }}</strong>
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
<script type="text/javascript">
	function addMore() {
		var html = '<div class="append-here-div">';
		html += $('.append-div-div-edit').html();
		html += '<span class="button-chota" onclick="$(this).parent().remove()"> &times; </span>';
		html += '</div>';
		$('.append-here').append(html);
	}
</script>
@endsection