@extends('layouts.app')

@section('title','Category')

@push('css')
<link rel="stylesheet" style="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" style="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

@endpush

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<a href="{{route('category.create')}}" class="btn btn-info">Add Category</a>



<div class="card">
<div class="card-header card-header-primary" style="background-color:green; color:white;">
<h4 class="active">All Categories</h4>
</div>
@include('layouts.partial.msg');
<!-- <div class="card-body"> -->
<div class="card-content table-responsive">
<table  id="table" class="table table-striped table-bordered" style="width:100%">
    <thead class=" text-primary">
        <th>
            ID
        </th>
        <th>
            Name
        </th>
        <th>
            Slug 
        </th>
        <th>
           Created At
        </th>
        <th>
           Updated At
        </th>
        <th>
            Action
        </th>
    </thead>
    <tbody>

    @foreach($categories as $key=>$category)

        <tr>
            <td> {{ $key + 1 }} </td>
            <td> {{ $category->name}} </td>
            <td> {{ $category->slug}} </td>
            <td>{{  $category->created_at}}</td>
            <td>{{  $category->updated_at}}</td>
            <td>
            <a href="{{route('category.edit',$category->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a> 
            
    {{-- //Writing Edelete code     --}}

            <form action="{{route('category.destroy',$category->id)}}" method="POST" style="display:none;" id="delete-form-{{$category->id}}">
                
                {{ csrf_field() }}

                {{method_field('DELETE')}}


            </form>
        
<button type="button"  class="btn btn-danger btn-sm" onclick="if(confirm('Are you Sure you want to delete this')){

   event.preventDefault();
 document.getElementById('delete-form-{{$category->id}}').submit();
}
else{
    event.preventDefault();
}">
   
    <i class="material-icons">delete</i></button>

        </td>
    </tr>

        @endforeach

    </tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>

@endsection

@push('scripts')
 
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>

@endpush