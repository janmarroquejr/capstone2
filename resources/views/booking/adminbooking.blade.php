@extends('layouts.template')

@section('content')

<div class="container overflow-auto">
	
	<div id="alert-success" style="display: none;"class="text-center alert alert-success alert-dismissible fade show" role="alert">
		<span>Successfully Archived!</span>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div id="alert-restore" style="display: none;"class="text-center alert alert-success alert-dismissible fade show" role="alert">
		<span>Successfully Restored!</span>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<h1 class="text-center">Bookings</h1>
	<div>
		<ul>
			<li><a href="/viewbookings">View All</a></li>
			<li><a href="/viewpending">View Only Pending</a></li>
			<li><a href="/viewcompleted">View Only Completed</a></li>
			<li><a href="/viewarchived">View Archived</a></li>
		</ul>
	</div>
	<table class="table table-bordered">
		<tr>
			<th>#</th>
			<th>Registered</th>
			<th>Customer Name</th>
			<th>Contact Number</th>
			<th>Number of guests</th>
			<th>Duration</th>
			<th>Date</th>
			<th>Time</th>
			<th>Comments</th>
			<th>Status</th>
			<th></th>
		</tr>
		<tbody>
			@forelse($bookings as $index => $booking)
			<tr>
				<td>{{++$index}}</td>
				<td>{{$booking->created_at->diffForHumans()}}</td>
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
				</td>
				@else
				<td>
					Completed 
				</td>
				@endif
				@if($booking->status == 0)
				<td>
					<a href="/completebooking/{{$booking->id}}" class="btn btn-outline-success">Complete</a>
					@if($booking->trashed())
					<button class="text-danger" id="restore" data-id="{{$booking->id}}">Restore</button>
					@else
					<button class="text-danger" id="archive" data-id="{{$booking->id}}">Archive</button>
					@endif
				</td>
				@else
				<td>
					<a href="/returnbooking/{{$booking->id}}" class="btn btn-outline-danger">Pending</a>
					@if($booking->trashed())
					<button class="text-danger" id="restore" data-id="{{$booking->id}}">Restore</button>
					@else
					<button class="text-danger" id="archive" data-id="{{$booking->id}}">Archive</button>
					@endif
				</td>
				@endif
			</tr>
			@empty
			<td colspan="11" class="text-center">Nothing to show</td>
			@endforelse
		</tbody>
	</table>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function(event){
		let archive = document.querySelectorAll('#archive');
		let restore = document.querySelectorAll('#restore');

		restore.forEach(function(btn){
			btn.addEventListener('click', function(){
				let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				let id = btn.dataset.id;
				let url = '/restorebooking/'+id;
				let data = new FormData;

				data.append('_token', token);

				fetch(url, {
					method:'POST',
					body: data
				}).then(function(res){
					return res.text();
				}).then(function(data){
					let alertRestore = document.getElementById('alert-restore');
					alertRestore.style.display = "block";
					btn.parentNode.parentNode.style.display = "none";
				})
			})
		})

		archive.forEach(function(btn){
			btn.addEventListener('click', function(){
				let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				
				let id = btn.dataset.id;
				let url = '/archivebooking/'+id;
				let data = new FormData;
				
				// data.append('quantity', quantity);
				data.append('_token', token);

				
				
				fetch(url, {
					method: 'POST',
					body: data
				}).then(function(res){
					return res.text();
				}).then(function(data){
					let alertArchive = document.getElementById('alert-success');
					alertArchive.style.display = "block";
					btn.parentNode.parentNode.style.display = "none";
				})
			})
		})
	})
</script>
@endsection
