<link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
@extends('layouts.template')

@section('content')

<div class="container">
	<div class="row">
		@foreach($categories as $category)
			<div id="cat_buttons">
				<a href="" class="btn btn-outline-dark">{{$category->name}}</a>
			</div>						
		@endforeach
	</div>
	
	<div class="row">
		@foreach($menu_items as $item)
		<div class="card">
			<div class="header">
				<img src="{{asset($item->image_path)}}">
				{{-- <div class="icon">
					<a href="#"><i class="fa fa-heart-o"></i></a>
				</div> --}}
			</div>
			<div class="text d-flex flex-column mt-auto">
				<h3 class="food">
					{{$item->name}}
				</h3>


				<div class="price">
					<p>&#8369;{{number_format($item->price)}}</p>
				</div>
				<p class="info">{{$item->description}}</p>
			</div>
			<button href="#" class="btn">Add to reservation</button>
		</div>
		@endforeach
	</div>
</div>

@endsection