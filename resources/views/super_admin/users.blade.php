@extends('layouts.template')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Activated Accounts</h1>
            <table class="table table-striped">
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
                    <tr>
                    <td>{{++$index}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->contact_number}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                    <a href="/deleteuser/{{$user->id}}">Deactivate</a>
                    </td>
                    </tr>
                    @empty
                        <td colspan="9">Nothing to show</td>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h1>Deactivated Accounts</h1>
            <table class="table table-striped">
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
                    <a href="/restoreuser/{{$user->id}}">Activate</a>
                    </td>
                    </tr>
                    @empty
                        <td colspan="9">Nothing to show</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection 