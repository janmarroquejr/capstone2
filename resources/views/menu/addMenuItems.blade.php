@extends('layouts.template')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		
		
		<div id="alert-success" style="display:none" class="alert alert-success alert-dismissable" role="alert">
			Item added successfully!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aira-hidden="true">&times;</span>
			</button>
		</div>
		

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
						<div class="modal-body">
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
			<form action="" method="POST" id="myForm" enctype="multipart/form-data">
				@csrf

				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control">
				<label for="price">Price</label>
				<input type="text" name="price" id="price" class="form-control">
				<label for="description">Description</label>
				<textarea type="text" name="description" id="description" class="form-control"></textarea>
				<label for="image">Image</label>
				<input type="file" name="image" class="form-control" id="image">
				<label for="categories">Category</label>
				<select name="category" class="form-control" id="category">
					@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				<input type="hidden" name="id" value="">
				<button type="submit" id="submit" class="btn btn-primary form-control mt-2">Submit</button>

			</form>
			<a href="/archiveditems">View Archived Menu Items</a>
		</div>

		<div class="col-md-9 overflow-auto">
			<table class="table table-bordered table-striped" id="table">
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
							{{-- <form action="/edit/{{$item->id}}/edit" method="POST">
								@csrf
								<button>Edit</button>
							</form> --}}
							<a href="/edit/{{$item->id}}/edit" class="btn btn-success">Edit</a>
							<a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})" data-target="#DeleteModal" class="text-danger">Delete</a>
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
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous">
</script>
<script>
	document.addEventListener('DOMContentLoaded', function(event){
		let submit = document.querySelector('#submit');
		
		submit.addEventListener('click', function(e){
			e.preventDefault();

			let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
			let name = document.getElementById('name');
			let price = document.getElementById('price');
			let description = document.getElementById('description');
			let category = document.getElementById('category');
			let image = document.querySelector('input[type=file]');
			let imageSrc = image.src;

			let nameValue = name.value;
			let priceValue = price.value;
			let descriptionValue = description.value;
			let categoryValue = category.value;
			let imageValue = image.files[0];
			let imageURL = URL.createObjectURL(imageValue);

			let categoryInner = document.getElementById('category').innerHTML;

			let url = '/addtomenu/';
			let data = new FormData;



			data.append('_token', token);
			data.append('name', nameValue);
			data.append('price', priceValue);
			data.append('description', descriptionValue);
			data.append('category', categoryValue);
			data.append('image_path', imageValue);

			fetch(url, {
				method: 'POST',
				body: data
			}).then(function(res){
				return res.text();
			}).then(function(data){

				let alertSuccess = document.getElementById('alert-success');
				alertSuccess.style.display = "block";

				let table = document.getElementsByTagName('table')[0];
				let newRow = table.insertRow(table.rows.length);

				let newCell1 = newRow.insertCell(0);
				let newCell2 = newRow.insertCell(1);
				let newCell3 = newRow.insertCell(2);
				let newCell4 = newRow.insertCell(3);
				let newCell5 = newRow.insertCell(4);
				let newCell6 = newRow.insertCell(5);
				let newCell7 = newRow.insertCell(6);

				newCell1.innerHTML = "{{++$index}}";
				newCell2.innerHTML = "<img style='height: 100px; width:150px; object-fit: cover;' src='"+imageURL+"'>"
				newCell3.innerHTML = nameValue;
				newCell4.innerHTML = priceValue;
				newCell5.innerHTML = descriptionValue;

				if(categoryValue == 1){
					newCell6.innerHTML = "Starters";
				}
				else if(categoryValue == 2){
					newCell6.innerHTML = "Entrees";
				}
				else if(categoryValue == 3){
					newCell6.innerHTML = "Sides";
				}
				else if(categoryValue == 4){
					newCell6.innerHTML = "Desserts";
				}
				else{
					newCell6.innerHTML = "Drinks";
				}

				newCell7.innerHTML = "<a href='/edit/{{$item->id++}}/edit' class='btn btn-success'>Edit</a><a href='javascript:;'' data-toggle='modal' onclick='deleteData({{$item->id++}})' data-target='#DeleteModal' class='text-danger'>Delete</a>"
			})
		})
	})

</script>


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


