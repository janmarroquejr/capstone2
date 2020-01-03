@extends('layouts.template')

@section('content')

<div class="container-fluid">
    <div id="alert-success" style="display: none;"class="text-center alert alert-success alert-dismissible fade show" role="alert">
		<span>Activated User!</span>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div id="alert-danger" style="display: none;"class="text-center alert alert-danger alert-dismissible fade show" role="alert">
		<span>Deactivated User!</span>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Activated Accounts</h1>
            <a href="/deactivated">View Deactivated accounts</a>
            <hr>
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name:</th>
                    <th>Role:</th>
                    <th>Gender:</th>
                    <th>Contact:</th>
                    <th>E-mail:</th>
                    <th>Created At:</th>
                    <th>Updated At:</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr id="user">
                        <td>{{++$index}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->contact_number}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                        <button id="deactivate" data-id="{{$user->id}}">Deactivate</button>
                        </td>
                    </tr>
                    @empty
                        <td colspan="9" class="text-center">Nothing to show</td>
                    @endforelse
                </tbody>
            </table>
        </div>

        
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
	
	
</script>
<script>
    $(document).ready(function(){
        $('.alert').delay(5000).fadeOut(300);
    });
    
    document.addEventListener('DOMContentLoaded', function(event){
        let deactivate = document.querySelectorAll('#deactivate');
        let activate = document.querySelectorAll('#activate');
        let users = document.querySelectorAll('#user');
    
        deactivate.forEach(function(btn){
            btn.addEventListener('click', function(){
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let id = btn.dataset.id;
                // console.log(id);
                let url = '/deleteuser/'+id;
                let data = new FormData;
                data.append('_token', token);

                //hide deleted row
                btn.parentNode.parentNode.style.display = "none";
                
                fetch(url, {
                    method: 'POST',
                    body: data
                }).then(function(res){
                    return res.text();
                }).then(function(data){
                    let alertDanger = document.getElementById('alert-danger');
                    alertDanger.style.display = "block";
                })
            })
        })
    })
</script>

@endsection 
                
                
    
                
                
                    
    
    
                    
                   
    