@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Archived Items</h2>
            <table class="table table-bordered">
                <thead>
                    <th>Image</th>
                    <th>Item</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse($menu_items as $item)
                    <tr>
                        <td><img  style="height: 100px; width:150px; object-fit: cover;" src="{{asset($item->image_path)}}" alt=""></td>
                        <td>{{$item->name}}</td>
                        <td><button data-id="{{$item->id}}" id="restore" class="text-success">Restore</button></td>
                    </tr>

                    
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Nothing to show</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    	document.addEventListener('DOMContentLoaded', function(event){
		let restore = document.querySelectorAll('#restore');

		restore.forEach(function(btn){
			btn.addEventListener('click', function(){
				let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				
				let id = btn.dataset.id;
				let url = '/restoreitem/'+id;
				let data = new FormData;
				
                data.append('_token', token);
				
				
				fetch(url, {
					method: 'POST',
                    body: data
				}).then(function(res){
					return res.text();
				}).then(function(data){
                    btn.parentNode.parentNode.style.display = "none";
				})
			})
		})
	})
</script>
@endsection