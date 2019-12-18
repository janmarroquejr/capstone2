@extends('layouts.template')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<h1 class="text-center">Reservation Form</h1>

			@if(session()->has('reserved'))
			<div class="alert alert-success alert-dismissable fade show" role="alert">
				{{session()->get('reserved')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aira-hidden="true">&times;</span>
				</button>
			</div>
			@endif

			@if(session()->has('denied'))
			<div class="alert alert-danger alert-dismissable fade show" role="alert">
				{{session()->get('denied')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aira-hidden="true">&times;</span>
				</button>
			</div>
			@endif

			
		<form action="/booking/{{Auth::user()->id}}" method="POST" id="form">
				@csrf

				<label for="name">Name:</label>
				<input class="form-control" type="text" name="name" value="{{$user->name}}" disabled>
				<label for="start_date">Date:</label>
				<input class="form-control" type="date" name="start_date" required>
				<label for="num_of_guests">Number of Guests(max 10):</label>
				<select class="form-control" name="num_of_guests">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
				</select>
				<label for="start_time">Start Time:</label>
				<input class="form-control" type="time" name="start_time" required>
				<label for="duration">Duration(in hours):</label>
				<select class="form-control" name="duration">
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
				<label for="comments">Comments/Suggestions: </label>
				<textarea class="form-control" name="comments"></textarea>
				<p>
					@if($food_id = null)
					you have no pre-orders
					@else
					You have pre-orders
					@endif
				</p>
				<button class="btn btn-outline-dark mt-2 form-control">Submit</button>
				{{-- <a class="btn btn-outline-dark mt-2" href="/menu">Pre-order your food</a> --}}
			</form>

		</div>
		<div class="col-md-4 col-sm-12">
			<h1 class="text-center">Pre-Orders</h1>
			@if(session()->has('pre-ordered'))
			<div class="alert alert-success alert-dismissable fade show" role="alert">
				{{session()->get('pre-ordered')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aira-hidden="true">&times;</span>
				</button>
			</div>
			@endif

			@if(session()->has('removed'))
			<div class="alert alert-danger alert-dismissable fade show" role="alert">
				{{session()->get('removed')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aira-hidden="true">&times;</span>
				</button>
			</div>
			@endif

			<table class="table table-striped table-bordered">
				<tr>
					<th>Food</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
					<th></th>
				</tr>
				<tbody>
					@forelse($menu_items as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>&#8369;{{number_format($item->price)}}</td>
						<td>{{$item->quantity}}</td>
						<td>&#8369;{{number_format($item->price * $item->quantity)}}</td>
						<td><a href="/removeitem/{{$item->id}}" class="text-danger" style="text-decoration: underline;">Remove</a></td>
					</tr>
					@empty
					<tr>
						<td colspan="5" class="text-center">Nothing to show</td>
					</tr>
					@endforelse
					<tr>
						<td colspan="4">Total:</td>
						<td><strong>&#8369;{{number_format($total)}}</strong></td>
					</tr>
				</tbody>
			</table>
			<p class="text-danger">Note: You need to have an active reservation to pre-order food.</p>
			<a style="text-decoration: underline;" href="/menu">Add food</a>
			<a href="/add" class="btn btn-outline-dark form-control">Add to reservation</a>
		</div>


	</div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.alert').delay(2000).fadeOut(300);
	});

	// function myFunction() {
	// 	document.getElementById("form").reset();
	// }
</script>
@endsection