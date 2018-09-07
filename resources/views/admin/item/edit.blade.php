@extends('layouts.app')

@section('title','Item')

@push('css')

@endpush

@section('content')

<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-primary">
<h4 class="active">Update item</h4>
</div>
<!-- <div class="card-body"> -->
<div class="card-content">
{{-- @foreach($item as $key=>$item) --}}

<form method="POST" action="{{ route('item.update',$item->id) }}" enctype="multipart/form-data">

{{ csrf_field() }}

{{ method_field('PUT') }}

<div class="row">
<div class="col-md-12">

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

 
@include('layouts.partial.msg');

 
<div class="form-group label-floating">
    <label class="control-label">Category</label>
    {{-- <input type="text" class="form-control" name="title"> --}}
    <select class="form-control" name="category">
       
        @foreach($categories as $key=>$category)

        <option {{ $category->id == $item->category->id ? 'selected' : '' }} 
            value="{{ $category->id }}">{{ $category->name }}
        </option>
       
    @endforeach
    
</select>
</div>
</div> 
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group label-floating">
    <label class="control-label">Name</label>
<input type="text" class="form-control" name="name" value="{{$item->name}}">
</div>
</div>
</div>



<div class="row">
<div class="col-md-12">
<div class="form-group label-floating">
    <label class="control-label">Description</label>
    {{-- <input type="text" class="form-control" name="name"> --}}
<textarea class="form-control" name="description">{{$item->description}}
    </textarea>
</div>
</div>
</div>


<div class="row">
<div class="col-md-12">
<div class="form-group label-floating">
    <label class="control-label">Price</label>
<input type="number" class="form-control" name="price" value="{{$item->price}}">
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

{{-- @endforeach --}}

<a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
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