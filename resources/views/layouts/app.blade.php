<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'Laravel') }}</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src={{URL::asset('js/jquery.serializejson.js') }}></script>
		<script type="text/javascript" src={{URL::asset('js/jquery.validate.js') }}></script>
		<link  href="{{URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>		
		<script src="{{URL::asset('js/myApp.js') }}"></script>
	

	</head>
	<body>
		@guest
			@include('layouts.auth')
		@else
			@include('layouts.sidebar')
		@endguest
	</body>
</html>
