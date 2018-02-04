<!DOCTYPE html>
<html>
<head>
	{{-- title to be dynamically added --}}
	<title>@yield('title')</title>

	{{-- css files --}}
	<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css.map') }}">
	<link rel="stylesheet" href="{{ asset('css/web-fonts-with-css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	{{-- from the cloud --}}
	{{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
</head>
<body class="container-fluid">
	{{-- header defined in header.blade.php file --}}
	@include('partials.header')

		<div class="body">
			<div class="content">
				{{-- content goes here --}}
				@yield('content')
			</div>
		</div>

	{{-- footer defined in footer.blade.php --}}
	@include('partials.footer')

{{-- script files--}}
<script src="{{ asset('/js/jquery-3.2.1.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/js/script.js') }}" type="text/javascript" ></script>
<script src="{{ asset('/js/parsley.min.js') }}" type="text/javascript" ></script>
</body>
</html>