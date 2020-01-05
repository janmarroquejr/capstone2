<link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
@extends('layouts.template')

@section('content')

<a href="#" id="scroll" style="display: none;"><span></span></a>
<div class="container">

	<nav class="navbar position-sticky">
		<ul>
			<li><a href="#starters">Starters</a></li>
			<li><a href="#entrees">Entrees</a></li>
			<li><a href="#sides">Sides</a></li>
			<li><a href="#desserts">Desserts</a></li>
			<li><a href="#drinks">Drinks</a></li>
		</ul>
	</nav>
	<hr>
	
	
	<section id="starters">
		<h1 class="text-center">starters</h1>
		
		<div class="row starters">
			@foreach($starters as $item)
			<div class="col-md-6 col-sm-12">
				<div class="menu-item">
					
					<div class="img float-left">
						<img src="{{asset($item->image_path)}}" alt="">
					</div>
					
					<div class="item-body">
						<div class="desc">
							<p>{{$item->description}}</p>
						</div>
						<div class="price">
							<p>&#8369;{{number_format($item->price)}}</p>
						</div>
					</div>
	
				</div>
			</div>
			@endforeach
		</div>
		<hr>
	</section>

	<section id="entrees">
		<h1 class="text-center">Entrees</h1>
	
		<div class="row entrees">
			@foreach($entrees as $item)
			<div class="col-md-6 col-sm-12">
				<div class="menu-item">
					
					<div class="img float-left">
						<img src="{{asset($item->image_path)}}" alt="">
					</div>
					
					<div class="item-body">
						<div class="desc">
							<p>{{$item->description}}</p>
						</div>
						<div class="price">
							<p>&#8369;{{number_format($item->price)}}</p>
						</div>
					</div>
	
				</div>
			</div>
			@endforeach
		</div>
		<hr>
	</section>

	<section id="sides">
		<h1 class="text-center">Sides</h1>
	
		<div class="row sides">
			@foreach($sides as $item)
			<div class="col-md-6 col-sm-12">
				<div class="menu-item">
					
					<div class="img float-left">
						<img src="{{asset($item->image_path)}}" alt="">
					</div>
					
					<div class="item-body">
						<div class="desc">
							<p>{{$item->description}}</p>
						</div>
						<div class="price">
							<p>&#8369;{{number_format($item->price)}}</p>
						</div>
					</div>
	
				</div>
			</div>
			@endforeach
		</div>
		<hr>
	</section>

	<section id="desserts">
		<h1 class="text-center">Desserts</h1>
	
		<div class="row desserts">
			@foreach($desserts as $item)
			<div class="col-md-6 col-sm-12">
				<div class="menu-item">
					
					<div class="img float-left">
						<img src="{{asset($item->image_path)}}" alt="">
					</div>
					
					<div class="item-body">
						<div class="desc">
							<p>{{$item->description}}</p>
						</div>
						<div class="price">
							<p>&#8369;{{number_format($item->price)}}</p>
						</div>
					</div>
	
				</div>
			</div>
			@endforeach
		</div>
		<hr>
	</section>

	<section id="drinks">
		<h1 class="text-center">Drinks</h1>
	
		<div class="row drinks">
			@foreach($drinks as $item)
			<div class="col-md-6 col-sm-12">
				<div class="menu-item">
					
					<div class="img float-left">
						<img src="{{asset($item->image_path)}}" alt="">
					</div>
					
					<div class="item-body">
						<div class="desc">
							<p>{{$item->description}}</p>
						</div>
						<div class="price">
							<p>&#8369;{{number_format($item->price)}}</p>
						</div>
					</div>
	
				</div>
			</div>
			@endforeach
		</div>
		<hr>
	</section>


</div>


{{-- <div class="container old">
	<div id="alert-success" style="display: none;"class="text-center alert alert-success alert-dismissible fade show" role="alert">
		<span>Added to reservation!</span>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div id="alert-danger" style="display: none;"class="text-center alert alert-danger alert-dismissible fade show" role="alert">
		<span>Please specify quantity!</span>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<a href="#" id="scroll" style="display: none;"><span></span></a>
	
	<div class="row justify-content-center">
		<div id="cat_buttons">
			<a href="/menu" class="btn btn-outline-dark">All</a>
		</div>	
		@foreach($categories as $category)
		<div id="cat_buttons">
			<a href="/filter/{{$category->id}}" class="btn btn-outline-dark">{{$category->name}}</a>
		</div>						
		@endforeach
	</div>
	
	<div class="row justify-content-center">
		@foreach($menu_items as $item)
		<div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-stretch">
			<div class="card">
				<div class="header">
					<img src="{{asset($item->image_path)}}">
				</div>
			<div class="text d-flex flex-column mt-auto">
				<h3 class="food">
					{{$item->name}}
				</h3>


				<div class="price">
					<p>&#8369;{{number_format($item->price)}}</p>
				</div>
				<p class="info">{{$item->description}}</p>
			</div>
			<input type="number" name="quantity" min=1 class="form-control" value="1">
			<button data-id="{{$item->id}}" id="addToCart" class="btn">Add to reservation</button>
		</div>
	</div>
	@endforeach
</div>  --}}

@endsection



<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
	
	
</script>

<script type="text/javascript">
	$(document).ready(function(){ 
		$(window).scroll(function(){ 
			if ($(this).scrollTop() > 100) { 
				$('#scroll').fadeIn(); 
			} else { 
				$('#scroll').fadeOut(); 
			} 
		}); 
		$('#scroll').click(function(){ 
			$("html, body").animate({ scrollTop: 0 }, 600); 
			return false; 
		}); 
	});
</script>

@section('script')
<script>
	$(document).ready(function(){
		$('.alert').delay(5000).fadeOut(300);
	});
	
	document.addEventListener('DOMContentLoaded', function(event){
		let addToCart = document.querySelectorAll('#addToCart');

		addToCart.forEach(function(btn){
			btn.addEventListener('click', function(){
				let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				let quantity = btn.previousElementSibling.value;
				
				let id = btn.dataset.id;
				let url = '/preorder/'+id;
				let data = new FormData;
				
				data.append('quantity', quantity);
				data.append('_token', token);

				
				
				fetch(url, {
					method: 'POST',
					body: data
				}).then(function(res){
					return res.text();
				}).then(function(data){
					let alertSuccess = document.getElementById('alert-success');
					

					let alertDanger = document.getElementById('alert-danger');

					if(quantity == ""){
						alertDanger.style.display = "block";
					}else{
						alertSuccess.style.display = "block";
					}

				})
			})
		})
	})
</script>
@endsection
