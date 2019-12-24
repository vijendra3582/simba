<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/vendors/css/vendor.bundle.base.css') }}">
	<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
	<link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon.ico" />
	<script src="{{ URL::asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
	<style>
		.edit-tabel {
			float: left;
			background: lightgray;
			padding: 5px 14px;
			color: #000;
			font-weight: 500;
		}
		.edit-tabel:hover {
			text-decoration:none;
			color:#000;
		}
		.delete-tabel {
			float: left;
			background: red;
			padding: 5px 14px;
			color: #fff;
			font-weight: 500;
			border: 0;
		}
		.form-group {
			float: left;
			width: 100%;
		}
		.form-group label {
			float: left;
			width: 100%;
			font-weight: 600;
		}
		input.btn {
			padding: 9px 31px;
			text-transform: uppercase;
		}

		.form-group .form-control {
			border: 2px solid lightgray;
			outline: 0;
			padding: 5px 13px;
			height: 39px;
		}
		.form-group .form-control:focus {
			border-color: #2196F3;
			outline: 0;
		}
		.card .card-description {
			margin-bottom: 1.9rem;
		}
		.form-checkbox {
			float: left;
			width: 100%;
			margin: 10px auto;
		}
		.form-checkbox input[type="checkbox"] {
			float: left;
			vertical-align: middle;
			margin-right: 10px;
			cursor: pointer;
		}
		.form-checkbox label {
			float: left;
			width: auto;
			cursor: pointer;
		}
		.error-messages {
			float: left;
			position: fixed;
			bottom: 0;
			right: 12px;
			z-index: 99;
		}
		.table td {
			max-width: 200px;
			overflow: hidden;
			white-space: unset;
			line-height: 20px;
		}
	</style>
</head>
<body>
    <div class="container-scroller">
		@include('admin.partials.nav')
		<div class="container-fluid page-body-wrapper">
		 @include('admin.partials.sidebar')
		  <div class="main-panel">
			<div class="content-wrapper">
			@yield('content')
			</div>
			@include('admin.partials.footer')
		  </div>
		</div>
    </div>
	<div class="error-messages">
		@if(Session::has('flash_message'))
         <div class="alert alert-success"> {!! session('flash_message') !!}</div>
        @endif 
        @include ('errors.list') {{-- Including error file --}}
	</div>
	<script src="{{ asset('assets/vendors/select2/js/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.select2').select2();
		});
	</script>
</body>
</html>
