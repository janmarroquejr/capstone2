@extends('layouts.template')

@section('content')

<div class="container overflow-auto">
	<table class="table table-bordered table-striped">
		<tr>
			<th>#</th>
			<th>Customer Name</th>
			<th>Contact Number</th>
			<th>Number of guests</th>
			<th>Duration</th>
			<th>Date</th>
			<th>Time</th>
			<th>Comments</th>
			<th>Status</th>
			<th>Food Order #</th>
			<th></th>
		</tr>
		<tbody>
			@forelse($bookings as $index => $booking)
			<tr>
				<td>{{++$index}}</td>
				<td>{{$booking->user->name}}</td>
				<td>{{$booking->user->contact_number}}</td>
				<td>{{$booking->num_of_guests}}</td>
				<td>{{$booking->duration}}</td>
				<td>{{$booking->start_date}}</td>
				<td>{{$booking->start_time}}</td>
				<td>{{$booking->comments}}</td>
				@if($booking->status == 0)
				<td>
					Pending
					<form action="/updatestatus/{{$booking->id}}" method="POST">
						@csrf
						@method('PATCH')
						<input class="form-control" type="number" name="status" value="{{$booking->status}}" min=0 max=1>
						<button>Update</button>
					</form> 
						
				</td>
				@else
				<td>
					Completed 
					<form action="/updatestatus/{{$booking->id}}" method="POST">
						@csrf
						@method('PATCH')
						<input class="form-control" type="number" name="status" value="{{$booking->status}}" min=0 max=1>
						<button>Update</button>
					</form> 
				</td>
				@endif
				@if($booking->food_order_id == null)
				<td>No pre-order</td>
				@else
				<td>{{$booking->food_order_id}}</td>
				@endif
				<td><a href="/cancelbooking/{{$booking->id}}" class="btn btn-outline-danger">Remove Record</a></td>
			</tr>
			@empty
			<td colspan="11" class="text-center">No reservations</td>
			@endforelse
		</tbody>
	</table>
</div>

@endsection