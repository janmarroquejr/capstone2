@extends('layouts.template')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
<div class="container">
	<div class="row">
		@foreach($menu_items as $item)
		<div class="card">
			<div class="header">
				<img src="{{asset($item->image_path)}}">
				<div class="icon">
					<a href="#"><i class="fa fa-heart-o"></i></a>
				</div>
			</div>
			<div class="text">
				<h1 class="food">
					{{$item->name}}
				</h1>


				<div class="price">
					<p>&#8369;{{number_format($item->price)}}</p>
				</div>
				<p class="info">{{$item->description}}</p>
			</div>
			<a href="#" class="btn">Add to reservation</a>
		</div>
{{-- 		<div class="col-md-4">
			<img style="height: 120px; width: 150px; object-fit: cover;" src="{{$item->image_path}}"><br>
			<p>Name: {{$item->name}}</p><br>
			<p>Price: {{number_format($item->price, 2)}}</p><br>
			<p>Description: {{$item->description}}</p>
		</div> --}}
		@endforeach
	</div>
</div>

@endsection