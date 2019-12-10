@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
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
	</div>
</div>

@endsection