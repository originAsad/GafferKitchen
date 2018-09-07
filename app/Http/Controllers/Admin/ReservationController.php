<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function index(){
        $reservations=Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
    }
    public function status($id){
        $reservation=Reservation::find($id);
    	$reservation->status =true;
    	$reservation->save();
    	Toastr::success('Resrvation Successfully Confirmed','Success',["
    		positionClass"=>"toast-top-right"]);
    	return redirect()->back();
    }
    public function destroy($id){
           $reservation=Reservation::find($id);
            $reservation->delete();
            Toastr::error('Reservation request Delete Successfully',
            'Danger',["positionClass" => "toast-top-right"]); 
            return redirect()->back(); 
        
        }
}
