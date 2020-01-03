@extends('layouts.template')

@section('content')
    <div class="containter">
        <div id="alert-success" style="display: none;"class="text-center alert alert-success alert-dismissible fade show" role="alert">
            <span>Activated User!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Deactivated Accounts</h1>
                <a href="/users">View Activated Accounts</a>
                <hr>
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name:</th>
                        <th>Role:</th>
                        <th>Gender:</th>
                        <th>Contact:</th>
                        <th>E-mail:</th>
                        <th>Deleted At:</th>
                        
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @forelse($deleted as $index => $user)
                        <tr>
                        <td>{{++$index}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->contact_number}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->deleted_at}}</td>
                        
                        <td>
                        <button data-restore="{{$user->id}}" id="activate">Activate</a>
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
    
            activate.forEach(function(btn){
                btn.addEventListener('click', function(){
                    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    let id = btn.dataset.restore;
                    let url = '/restoreuser/'+id;
                    let data = new FormData;
                    data.append('_token', token);
                    btn.parentNode.parentNode.style.display = "none";
                    fetch(url, {
                        method: 'POST',
                        body: data
                    }).then(function(res){
                        return res.text();
                    }).then(function(data){
                        let alertSuccess = document.getElementById('alert-success');
                        alertSuccess.style.display = "block";
                    })
                })
            })
        })
    </script>
@endsection