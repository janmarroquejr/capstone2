@extends('layouts.template')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		
		@if(session()->has('success'))
		<div class="alert alert-success alert-dismissable" role="alert">
			{{session()->get('success')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aira-hidden="true">&times;</span>
			</button>
		</div>
		@endif

		@if(session()->has('delete'))
		<div class="alert alert-danger alert-dismissable" role="alert">
			{{session()->get('delete')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aira-hidden="true">&times;</span>
			</button>
		</div>
		@endif

		@if(session()->has('update'))
		<div class="alert alert-success alert-dismissable" role="alert">
			{{session()->get('update')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aira-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		{{-- delete modal --}}
		<div id="DeleteModal" class="modal fade text-danger" role="dialog">
			<div class="modal-dialog ">
				<!-- Modal content-->
				<form action="" id="deleteForm" method="post">
					<div class="modal-content">
{{-- 						<div class="bg-danger">
							<button type="button" class="close float-right" data-dismiss="modal">&times;</button>
							<h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
						</div>
 --}}						<div class="modal-body">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<p class="text-center">Are you sure you want to delete this item?</p>
						</div>
						<div class="modal-footer">
							<center>
								<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
								<button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>
		{{-- end of delete modal --}}
	</div>
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
				<button type="submit" class="btn btn-primary form-control mt-2">Submit</button>

			</form>
		</div>

		<div class="col-md-9 overflow-auto">
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
							<a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})" 
								data-target="#DeleteModal" class="text-danger">Delete</a>
								{{-- <a href="#" data-href="/deleteitem/{{$item->id}}" data-toggle="modal" data-target="#confirm-delete" class="text-danger">Delete</a> --}}
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

@section('jquery')
	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous">
</script>
@endsection


<script type="text/javascript">
	$(document).ready(function(){
		$('.alert').delay(5000).fadeOut(300);
	});

     function deleteData(id)
     {
         var id = id;
         var url = "/deleteitem/"+":id";
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

</script>
@endsection