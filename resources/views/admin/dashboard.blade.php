@extends('layouts.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="card card-stats">
<div class="card-header" data-background-color="orange">
<i class="material-icons">content_copy</i>
</div>
<div class="card-content">
<p class="category">Category/Item</p>
<h3 class="title">{{$categorycount}}/{{$itemcount}}
</h3>
</div>
<div class="card-footer">
<div class="stats">
    <i class="material-icons text-danger">warning</i>
    <a href="#pablo">Item and Categories...</a>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="card card-stats">
<div class="card-header" data-background-color="green">
<i class="material-icons">slideshow</i>
</div>
<div class="card-content">
<p class="category">Slider</p>
<h3 class="title">{{$slidercount}}</h3>
</div>
<div class="card-footer">
<div class="stats">
<i class="material-icons">date_range</i><a href="{{route('slider.index')}}"> Get more Details...</a>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="card card-stats">
<div class="card-header" data-background-color="red">
<i class="material-icons">info_outline</i>
</div>
<div class="card-content">
<p class="category">Reservations</p>
<h3 class="title">{{$reservation->count()}}</h3>
</div>
<div class="card-footer">
<div class="stats">
<i class="material-icons">local_offer</i> <a href="{{route('reservation.index')}}">Not Confirmed Reservation ...</a>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="card card-stats">
<div class="card-header" data-background-color="blue">
<i class="fa fa-twitter"></i>
</div>
<div class="card-content">
<p class="category">Contacts</p>
<h3 class="title">{{$contactcount}}</h3>
</div>
<div class="card-footer">
<div class="stats">
<i class="material-icons">update</i><a href="{{route('contact.index')}}">Messages...</a>
</div>
</div>
</div>
</div>
</div>


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
           
        </thead>
        <tbody>
    
        @foreach($reservation as $key=>$reservation)
    
            <tr>
                <td> {{ $key + 1 }} </td>
                <td> {{ $reservation->name }} </td>
                <td> {{ $reservation->phone }} </td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->date_and_time }}</td>
                <td>{{ $reservation->message }}</td>
                <td>
                @if($reservation->status==false)
                    
                    <span class="label label-danger">Not Confirmed</span>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>            
@endsection

@push('scripts')

@endpush