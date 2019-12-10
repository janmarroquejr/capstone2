@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		@foreach($menu_items as $item)
		<div class="col-md-4">
			<img style="height: 120px; width: 150px;" src="{{$item->image_path}}"><br>
			<p>Name: {{$item->name}}</p><br>
			<p>Price: {{number_format($item->price, 2)}}</p><br>
			<p>Description: {{$item->description}}</p>
		</div>
		@endforeach
	</div>
</div>

@endsection