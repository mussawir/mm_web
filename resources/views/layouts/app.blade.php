<!DOCTYPE html>
<html
	lang="{{ str_replace('_', '-', app()->getLocale()) }}"
	class="light-style customizer-hide"
>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

		{{-- CSRF Token --}}
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Maza Max</title>

		{{-- Favicon --}}
		<link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
		<link rel="icon" type="image/ico" href="/assets/images/favicon.ico">

		{{-- Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

		{{-- Icons --}}
		<link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.css') }}" />

		{{-- Core CSS --}}
		<link rel="stylesheet" href="{{ asset('assets/css/core.css') }}" class="template-customizer-core-css" />
		<link rel="stylesheet" href="{{ asset('assets/css/theme-default.css') }}" class="template-customizer-theme-css" />
		<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

		{{-- Vendors CSS --}}
		<link rel="stylesheet" href="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

		{{-- Page CSS --}}
		{{-- Page --}}
		<link rel="stylesheet" href="{{ asset('assets/css/page-auth.css') }}" />

		{{-- Helpers --}}
		<script src="{{ asset('assets/js/helpers.js') }}"></script>
		<script src="{{ asset('assets/js/config.js') }}"></script>
	</head>
	<body>
		<div class="container-xxl">
			<div class="authentication-wrapper authentication-basic container-p-y">
				@yield('content')
			</div>
		</div>

		{{-- Core JS --}}
		<script src="{{ asset('assets/libs/jquery/jquery.js') }}"></script>
		<script src="{{ asset('assets/libs/popper/popper.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
		<script src="{{ asset('assets/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
		<script src="{{ asset('assets/js/menu.js') }}"></script>

		{{-- Main JS --}}
		<script src="{{ asset('assets/js/main.js') }}"></script>

		<script async defer src="https://buttons.github.io/buttons.js"></script>
	</body>
</html>
