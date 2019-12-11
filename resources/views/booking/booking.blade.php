@extends('layouts.template')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-6">
		<h1 class="text-center">Reservation Form</h1>
			<form action="" method="POST">
				@csrf

				<label for="name">Name:</label>
				<input class="form-control" type="text" name="name" value="{{$user->name}}" disabled>
				<label for="start_date">Date:</label>
				<input class="form-control" type="date" name="start_date" required>
				<label for="num_of_guests">Number of Guests(max 10):</label>
				<select class="form-control">
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
				<select class="form-control">
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
				<label for="comments">Comments/Suggestions: </label>
				<textarea class="form-control"></textarea>
				<button class="btn btn-outline-dark mt-2">Submit and Order Later</button>
				<a class="btn btn-outline-dark mt-2" href="/menu">Pre-order your food</a>
			</form>

		</div>
	</div>
</div>

@endsection