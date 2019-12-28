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
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico|Righteous&display=swap" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/template.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">


	{{-- Foneawesome --}}
	<script src="https://kit.fontawesome.com/72d0d6bced.js" crossorigin="anonymous"></script>
</head>
<body>
			
<div class="d-flex container-fluid" id="wrapper">
	<!-- Sidebar -->
	<div class="border-right sticky-top" id="sidebar-wrapper">
		{{-- <div class="sidebar-heading">Highsteaks</div> --}}
		<h1 class="head pb-2">Highersteaks</h1>
		<div class="list-group list-group-flush sticky-top">
				

				@guest
					<a class="list-group-item list-group-item-action bg-secondary text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
				@if(Route::has('register'))
					<a class="list-group-item list-group-item-action bg-secondary text-light" href="{{ route('register') }}">{{ __('Join Us') }}</a>
				@endif
				@else
				{{-- <a class="list-group-item list-group-item-action bg-secondary text-light" href="/booking/{{Auth::user()->id}}">{{ __('Reserve') }}</a> --}}
				@if(Auth::user()->role == 'user')
				<a class="list-group-item list-group-item-action bg-secondary text-light" href="/menu">{{ __('Menu') }}</a>
				<a class="list-group-item list-group-item-action bg-secondary text-light" href="/preorder/{{Auth::user()->id}}/reserve">{{ __('Reserve') }} <span class="badge badge-danger">{{collect(session('order'))->sum()}}</span></a>
				@endif
				@if(Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
					<a class="list-group-item list-group-item-action bg-secondary text-light" href="/addmenuitems">{{ __('Add Menu Items') }}</a>
					<a class="list-group-item list-group-item-action bg-secondary text-light" href="/viewbookings">{{ __('View Customer Reservations') }}</a>
				@endif
				@if(Auth::user()->role == 'super_admin')
					<a class="list-group-item list-group-item-action bg-secondary text-light" href="/users">{{ __('User control') }}</a>
				@endif
					<a id="navbarDropdown" class="list-group-item list-group-item-action bg-secondary text-light dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
		<button id="menu-toggle" type="button" class="mt-3 hamburger animated fadeInLeft is-closed sticky-top">
			<span class="hamb-top"></span>
			<span class="hamb-middle"></span>
			<span class="hamb-bottom"></span>
		</button>
		<main class="py-4">
			@yield('content')
		</main>
	</div>	
	
	
			
</div>


		
		
		
@yield('jquery')
@yield('script')

<script type="text/javascript">
	let menuToggle = document.getElementById('menu-toggle');
	let wrapper = document.getElementById('wrapper');
	
	menuToggle.addEventListener('click', function(e) {
		wrapper.classList.toggle("toggled");
		menuToggle.classList.toggle('is-open');
	});

</script>
</body>
</html>