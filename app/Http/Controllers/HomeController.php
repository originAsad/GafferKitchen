<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Slider;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $items=Item::all();
        $sliders=Slider::all();
        return view('welcome',compact('sliders','categories','items'));
    }


    
    public function checkout($id){
        $item=Item::find($id);
        return view('payment',compact('item'));
    }



    public function payment(Request $request ,$id){
       
        $categories=Category::all();
        $items=Item::all();
        $sliders=Slider::all();

        $item=Item::find($id);

        $price=$item->price;
        $description=$item->description;

        \Stripe\Stripe::setApiKey ( 'sk_test_INJvZWiP2ctnB2tzWvUwB1jo' );

        try {
            \Stripe\Charge::create ( array (
                    "amount" =>  $price * 100,
                    "currency" => "usd",
                    "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
                    "description" => $description 
                    
            ) );
            Toastr::success('Payment Successfully Confirmed','Success',["
            positionClass"=>"toast-top-right"]);
            
            return view('welcome',compact('categories','sliders','items'));

        
            // Session::flash ( 'success-message', 'Payment done successfully !' );
            // return Redirect::back ();
        } catch ( \Exception $e ) {
            // Session::flash ( 'fail-message', "Error! Please Try again." );
        }
    }
}
