@extends('layouts.app')

@section('title','Reservation')

@push('css')
<link rel="stylesheet" style="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" style="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

@endpush

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">


<div class="card">
<div class="card-header card-header-primary" style="background-color:green; color:white;">
<h4 class="active">All Reservation</h4>
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
         Phone
        </th>
        <th>
            Email
        </th>
        <th>
           Date and Time
        </th>
        <th>
           Message
        </th>
        <th>
            Status
        </th>
        <th>
            Action
        </th>
    </thead>
    <tbody>

    @foreach($reservations as $key=>$reservation)

        <tr>
            <td> {{ $key + 1 }} </td>
            <td> {{ $reservation->name }} </td>
            <td> {{ $reservation->phone }} </td>
            <td>{{ $reservation->email }}</td>
            <td>{{ $reservation->date_and_time }}</td>
            <td>{{ $reservation->message }}</td>
            <td>
                @if($reservation->status == true)
                <span class="label label-info">Confirmed</span>
                @else
                <span class="label label-danger">Not Confirmed Yet</span>
                @endif
            <td>

            <form action="{{route('reservation.status',$reservation->id)}}" 
            method="POST" style="display:none;" id="status-form-{{$reservation->id}}">
                
                {{ csrf_field() }}



            </form>
        
<button type="button"  class="btn btn-info btn-sm" onclick="if(confirm('Have you Verified this request by phone')){

   event.preventDefault();
 document.getElementById('status-form-{{$reservation->id}}').submit();
}
else{
    event.preventDefault();
}">
   
    <i class="material-icons">done</i></button>
  
                <form action="{{route('reservation.destroy',$reservation->id)}}" 
                method="POST" style="display:none;" id="delete-form-{{$reservation->id}}">
                    
                    {{ csrf_field() }}
    
                    {{method_field('DELETE')}}
    
    
                </form>
            
    <button type="button"  class="btn btn-danger btn-sm" onclick="if(confirm('Are you Sure you want to delete this')){
    
       event.preventDefault();
     document.getElementById('delete-form-{{$reservation->id}}').submit();
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