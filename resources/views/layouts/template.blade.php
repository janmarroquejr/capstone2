<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Highersteaks</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/template.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">


	{{-- Foneawesome --}}
	<script src="https://kit.fontawesome.com/72d0d6bced.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="d-flex container-fluid" id="wrapper">
	<!-- Sidebar -->
	<div class="bg-light border-right" id="sidebar-wrapper">
		{{-- <div class="sidebar-heading">Highsteaks</div> --}}
		<h1>Highsteaks</h1>
		<div class="list-group list-group-flush">
				<a class="list-group-item list-group-item-action bg-light" href="/menu">{{ __('Menu') }}</a>
				@guest
					<a class="list-group-item list-group-item-action bg-light" href="{{ route('login') }}">{{ __('Login') }}</a>
				@if(Route::has('register'))
					<a class="list-group-item list-group-item-action bg-light" href="{{ route('register') }}">{{ __('Register') }}</a>
				@endif
				@else
				@if(Auth::user()->role == 'admin')
					<a class="list-group-item list-group-item-action bg-light" href="/addmenuitems">{{ __('Add Menu Items') }}</a>
				@endif
					<a id="navbarDropdown" class="list-group-item list-group-item-action bg-light dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
				@endguest
		</div>
	</div>

	<div id="page-content-wrapper">
		<button id="menu-toggle"><i class="fas fa-bars"></i></i></button>
		<main class="py-4">
			@yield('content')
		</main>
	</div>	
	
	
			
</div>

		
		
		

<script type="text/javascript">
	let menuToggle = document.getElementById('menu-toggle');
	let wrapper = document.getElementById('wrapper');
	
	menuToggle.addEventListener('click', function(e) {
		wrapper.classList.toggle("toggled");
	});

</script>

</body>
</html>