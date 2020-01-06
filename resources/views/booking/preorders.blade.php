@extends('layouts.template')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-sm-8">
			
			
			<div class="alert alert-success alert-dismissable fade show" role="alert" style="display:none">
				Reservation Successful!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aira-hidden="true">&times;</span>
				</button>
			</div>
			
			
			
			<div class="alert alert-danger alert-dismissable fade show" role="alert" style="display:none">
				You already have an active reservation!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aira-hidden="true">&times;</span>
				</button>
			</div>
		
			
			<h1 class="text-center">Reservation Form</h1>
			
			

			
			

			
		<form method="POST" id="form">
				@csrf

				<label for="name">Name:</label>
				<input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" disabled>
				<label for="start_date">Date:</label>
				<input class="form-control" type="date" name="start_date" id="start-date" required>
				<label for="num_of_guests">Number of Guests(max 10):</label>
				<select class="form-control" name="num_of_guests" id="num-of-guests">
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
				<input class="form-control" type="time" name="start_time" id="start-time" required>
				<label for="duration">Duration(in hours):</label>
				<select class="form-control" name="duration" id="duration">
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
				<label for="comments">Comments/Suggestions: </label>
				<textarea class="form-control" name="comments" id="comments"></textarea>
				
				<button class="btn btn-outline-dark mt-2 form-control" data-id="{{Auth::user()->id}}" id="submit">Submit</button>
				{{-- <a class="btn btn-outline-dark mt-2" href="/menu">Pre-order your food</a> --}}
			</form>
			
		</div>
	</div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>



<script>

		document.addEventListener('DOMContentLoaded', function(event){
		let submit = document.querySelector('#submit');

		
			submit.addEventListener('click', function(e){
				e.preventDefault();
				let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				let name = document.getElementById('name');
				let startDate = document.getElementById('start-date');
				let numOfGuests = document.getElementById('num-of-guests');
				let startTime = document.getElementById('start-time');
				let duration = document.getElementById('duration');
				let comments = document.getElementById('comments');

				let nameValue = name.value;
				let startDateValue = startDate.value;
				let numOfGuestsValue = numOfGuests.value;
				let startTimeValue = startTime.value;
				let durationValue = duration.value;
				let commentsValue = comments.value;
				
				let id = submit.dataset.id;
				let url = '/booking/'+id;
				let data = new FormData;
				
				data.append('_token', token);
				data.append('name', nameValue);
				data.append('start_date', startDateValue);
				data.append('num_of_guests', numOfGuestsValue);
				data.append('start_time', startTimeValue);
				data.append('duration', durationValue);
				data.append('comments', commentsValue);

				fetch(url, {
					method: 'POST',
					body: data
				}).then(function(res){
					return res.text();
					
				}).then(function(data){
					console.log('{{$checker}}')
					
					if('{{$checker}}' == "true"){
						let alertDenied = document.querySelector('.alert-danger');
						alertDenied.style.display = "block";
						
					}
					else{
						let alertSuccess = document.querySelector('.alert-success');
						alertSuccess.style.display = "block";

					}
					document.getElementById('form').reset();
				})
			})
		})
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.alert').delay(2000).fadeOut(300);
	});

	// function myFunction() {
	// 	document.getElementById("form").reset();
	// }
</script>
@endsection
				
				




