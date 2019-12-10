@extends('layouts.template')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<h1>Add Menu Item</h1>
			<form action="/addtomenu" method="POST" enctype="multipart/form-data">
				@csrf

				<label for="name">Name</label>
				<input type="text" name="name" class="form-control">
				<label for="price">Price</label>
				<input type="text" name="price" class="form-control">
				<label for="description">Description</label>
				<textarea type="text" name="description" class="form-control"></textarea>
				<label for="image">Image</label>
				<input type="file" name="image" class="form-control">
				<label for="categories">Category</label>
				<select name="category" class="form-control">
					@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				<button type="submit" class="btn btn-primary form-control">Submit</button>

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
					<th>Action</th>
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
						<td>
							<form action="/edit/{{$item->id}}/edit" method="POST">
								@csrf
								<button>Update</button>
							</form>
								
							<a href="/deleteitem/{{$item->id}}" class="text-danger">Delete</a>
						</td>
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