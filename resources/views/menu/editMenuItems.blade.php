@extends('layouts.template')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<h1>Edit {{$menuItem->name}}</h1>
			<form action="/update/{{$menuItem->id}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="{{$menuItem->name}}">
				<label for="price">Price</label>
				<input type="text" name="price" class="form-control" value="{{$menuItem->price}}">
				<label for="description">Description</label>
				<textarea type="text" name="description" class="form-control">{{$menuItem->description}}</textarea>
				<label for="image">Image</label>
				<input type="file" name="image" class="form-control">
				<label for="categories">Category</label>
				<select name="category" class="form-control">
					@foreach($categories as $category)
						@if($category->id === $menuItem->category_id)
						<option selected value="{{$category->id}}">{{$category->name}}</option>
						@else
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endif
					@endforeach
				</select>
				<button type="submit" class="btn btn-primary form-control">Save Changes</button>

			</form>
		</div>

		<div class="col-md-9">
			<table class="table table-bordered table-striped">
				<tr>
					<th>#</th>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Description</th>
					<th>Category</th>
					
				</tr>
				<tbody>
					@forelse($items as $index => $item)
					<tr>
						<td>{{++$index}}</td>
						<td><img style="height: 100px; width:150px; object-fit: cover;"src="{{asset($item->image_path)}}"></td>
						<td>{{$item->name}}</td>
						<td>{{$item->price}}</td>
						<td>{{$item->description}}</td>
						<td>{{$item->category->name}}</td>
					
					</tr>
					@empty
					<tr>
						<td colspan="7" class="text-center">Nothing to show</td>
					</tr>

					@endforelse

				</tbody>
				
			</table>
		</div>
	</div>
</div>

				

<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').trigger('focus')
	})
</script>
@endsection