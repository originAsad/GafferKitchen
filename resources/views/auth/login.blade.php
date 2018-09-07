@extends('layouts.app')

@section('title','Login')

@push('css')

@endpush

@section('content')

<div class="content" style="width:80%;">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-primary" style="background-color:green;">
<h4 class="active" style="color:whitesmoke; font-family:Verdana, Geneva, Tahoma, sans-serif;">
    Login
</h4>
</div>
<!-- <div class="card-body"> -->
<div class="card-content">
<form method="POST" action="{{ route('login') }}">

    {{ csrf_field() }}

    <div class="row">

        <div class="row-md-8 col-md-offset-1">

@include('layouts.partial.msg')

<div class="form-group label-floating">
    <label class="control-label">Email</label>
<input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
</div>

<div class="form-group label-floating">
    <label class="control-label">Password</label>
<input type="password" class="form-control" name="password" value="{{old('password')}}" required>
</div>

</div>
</div>
<br/>

<button type="submit" class="btn btn-primary">Login</button>
<a href="{{route('welcome')}}" class="btn btn-danger">Back</a>

<!-- </div> -->
</form>
<br/>
</div>
</div>
</div>
</div>

</div>
</div>

@endsection

@push('scripts')


@endpush