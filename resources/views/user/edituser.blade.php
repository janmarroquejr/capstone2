@extends('layouts.template')

@section('content')
<div class="container">

    @if(session()->has('edited'))
    <div id="alert-success" class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <span>Updated successfully!</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    <form action="/edituser/{{Auth::user()->id}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
        <label for="gender">Gender:</label>
        <select name="gender" name="gender" class="form-control">
            @if(Auth::user()->gender == 'Male')
            <option selected>Male</option>
            <option>Female</option>
            @else
            <option>Male</option>
            <option selected>Female</option>
            @endif
        </select>
        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" class="form-control" value="{{Auth::user()->contact_number}}">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
@endsection