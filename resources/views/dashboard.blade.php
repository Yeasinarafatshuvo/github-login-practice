@extends('master')

@section('content')

<h1 class="bg-secondary">This is Dashboard</h1>
<div class="row">
    <div class="col-md-3">
        Name: {{Session::get('name')}}
    </div>
    <div class="col-md-2">
        Email: {{Session::get('user_id')}}
    </div>
    <div class="col-md-3">
        User Id: {{Session::get('email')}}
    </div>
    <div class="col-md-2">
        NickName:  {{Session::get('nickName')}}
    </div>
</div>
<a href="/logout" class="btn btn-primary">LogOut</a>
@endsection