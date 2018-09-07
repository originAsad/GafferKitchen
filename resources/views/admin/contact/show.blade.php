@extends('layouts.app')

@section('title','Contact Details')

@push('css')

@endpush

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">



<div class="card">
<div class="card-header card-header-primary" style="background-color:green; color:white;">
<h4 class="active"> Contact Details</h4>
</div>


<div class="card-content">
    <div class="row">
        <div class="col-md-12">
        <strong><h2>{{strtoupper($contact->name)}}</h2></strong>
        <strong> Email: </strong> <h3>{{$contact->email}}</h3>
        <strong> Message: </strong> <p>{{$contact->message}}</p><br/>

        </div>
    </div>
</div>

</div>
</div>
</div>

</div>
</div>
@endsection

@push('scripts')
 

@endpush