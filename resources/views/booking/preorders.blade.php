@extends('layouts.template')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-4">

			<table class="table table-striped table-bordered">
				<tr>
					<th>Food</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
				<tbody>
						@forelse($menu_items as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td><input type="number" name="quantity" value="{{$item->quantity}}"></td>
						<td>{{$item->price}}</td>
					</tr>
						@empty
						@endforelse
						<tr>
							<td colspan="2">Total:</td>
							<td>{{$total}}</td>
						</tr>
				</tbody>
			</table>
			<a href="" class="btn btn-primary form-control">Add to reservation</a>
		</div>
	</div>
</div>

@endsection