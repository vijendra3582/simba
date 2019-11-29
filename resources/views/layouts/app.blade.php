<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style type="text/css">
        body .app {
         float: left;
         width: 100%;
         display: flex;
         justify-content: center;
         }
         .app .form {
         width: 500px;
         padding: 20px;
         margin-top: 38px;
         }
         .form h1 {
         font-size: 23px;
         float: left;
         width: 100%;
         text-align: left;
         margin-bottom: 21px;
         }
         .form .form-group {
         float: left;
         width: 100%;
         margin: 10px auto;
         }
         .form-group label {
         float: left;
         width: 100%;
         font-weight: 600;
         }
         .form-group label+input {
         float: left;
         width: 76%;
         padding: 6px 10px;
         border: 2px solid gray;
         }
         .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #2196F3;
            outline: 0;
            box-shadow: none;
        }
         .form-group-checkbox {
         float: left;
         width: 100%;
         margin: 10px auto;
         }
         .form-group-checkbox label {
         float: left;
         width: auto;
         cursor: pointer;
         }
         .form-group-checkbox input#remember {
         float: left;
         width: 18px;
         vertical-align: middle;
         margin-top: 6px;
         margin-right: 7px;
         cursor: pointer;
         }
         .form input[type="submit"] {
         padding: 7px 37px;
         background: transparent;
         border: 2px solid gray;
         font-size: 17px;
         font-weight: 600;
         }
         .form input[type="submit"]:hover{
         border-color:#2196F3;
         color:#2196F3;
         }
         .form input[type="submit"]:focus{
         border-color:#2196F3;
         color:#2196F3;
         outline:0;
         }
         div#infoMessage p {
            color: red;
            font-weight: 500;
            display: list-item;
        }
        div#infoMessage {
            margin-left: 19px;
        }
		.form-group.has-error input {
			border-color: tomato;
		}
		.form-group.has-error span.help-block {
			float: left;
			width: 100%;
			color: tomato;
			font-size: .93rem;
			margin-top: 3px;
		}
		.error-messages {
			float: left;
			width: 100%;
			display: flex;
			justify-content: center;
		}
		.error-messages .alert {
			border-radius: 2px;
			float: left;
			width: 500px;
			height: auto;
			padding: 0;
			background: transparent;
			border: 0;
			margin: 0;
		}    
		.alert-danger {
			color: #F44336;
		}
		</style>
</head>
<body>
    <div class="app">

        @yield('content')

    </div>
	<div class="error-messages">
		@if(Session::has('flash_message'))
         <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
        @endif 
        @include ('errors.list') {{-- Including error file --}}
	</div>
</body>
</html>
