@extends('layouts.app')

@section('title','Slider')

@push('css')

@endpush

@section('content')

<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-primary">
<h4 class="active">Add New Slider</h4>
</div>
<!-- <div class="card-body"> -->
<div class="card-content">
<form method="POST" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">

{{ csrf_field() }}

{{ method_field('PUT') }}
<div class="row">
<div class="col-md-12">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group label-floating">
    <label class="control-label">Title</label>
<input type="text" class="form-control" name="title" value="{{$slider->title}}">
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group label-floating">
    <label class="control-label">Sub Title</label>
<input type="text" class="form-control" name="sub_title" value="{{$slider->sub_title}}">
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<!-- <div class="form-group label-floating"> -->
    <label class="control-label">Image</label>
<input type="file" name="image">    
</div>
</div>
<a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
<button type="submit" class="btn btn-primary">Update</button>
<!-- </div> -->
</form>
</div>
</div>
</div>
</div>

</div>
</div>

@endsection

@push('scripts')


@endpush