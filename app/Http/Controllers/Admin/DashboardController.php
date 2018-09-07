<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;
use App\Slider;
use App\Reservation;
use App\Contact;

class DashboardController extends Controller
{
    public function index(){
        $categorycount=Category::count();
        $itemcount=Item::count();
        $slidercount=Slider::count();
        $reservation=Reservation::where('status',false)->get();
        $contactcount=Contact::count();
        return view('admin.dashboard',compact('categorycount','itemcount',
        'slidercount','reservation','contactcount'));
    }
}
