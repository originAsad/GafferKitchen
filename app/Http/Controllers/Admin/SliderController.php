<?php

namespace App\Http\Controllers\admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        return view('admin.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // It will return all the Input
        // return $request->all();
        
        $this->validate($request,[
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'required | mimes:jpeg,jpg,png,bmp',
            //if you delete this required of image then the 
            //image will be viewed in default.png if you not upload image
            ]);
        
        //Here i have declare image above so that i can use it in mkdir
        
        $image=$request->file('image');
        
        //Here i have use str_slug($request->title); so that i can use slug in name image to store in db
        
        $slug=str_slug($request->title);

        if(isset($image)){

            //Carbon is use for storing date and time

            $currentDate=Carbon::now()->toDateString();
            
            //By this code Image will store like this asad-21-09-12-blahblahid.png|jpg|jpeg anything
            $imagename= $slug .'-'. $currentDate .'-'.uniqid() .'.'.
            $image->getClientOriginalExtension();

            //here 0777 is mode and true is recursive which i
            // dont know what but used for storing image in your server project
            if(!file_exists('uploads/slider')){
                mkdir('uploads/slider',0777,true);   
            }
            
         $image->move('uploads/slider',$imagename);   
        }
        else{
            $imagename='default.png';
        }
        //Storing it in Database

        $slider=new Slider();
        $slider->title=$request->title;
        $slider->sub_title=$request->sub_title;

        $slider->image=$imagename;
        $slider->save();

        return redirect()->route('slider.index')->
        with('successMsg','Slider Created Successfully');

    }
    

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // It will return all the Input
        // return $request->all();
        
        $this->validate($request,[
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'mimes:jpeg,jpg,png,bmp',
        ]);
        
        //Here i have declare image above so that i can use it in mkdir
        
        $image=$request->file('image');
        
        //Here i have use str_slug($request->title); so that i can use slug in name image to store in db
        
        $slug=str_slug($request->title);

        $slider=Slider::find($id);

        if(isset($image)){

            //Carbon is use for storing date and time

            $currentDate=Carbon::now()->toDateString();
            
            //By this code Image will store like this asad-21-09-12-blahblahid.png|jpg|jpeg anything
            $imagename= $slug .'-'. $currentDate .'-'.uniqid() .'.'.
            $image->getClientOriginalExtension();

            //here 0777 is mode and true is recursive which i
            // dont know what but used for storing image in your server project
            if(!file_exists('uploads/slider')){
                mkdir('uploads/slider',0777,true); 
                //Here 0777 is mode 
                
                //true thing is recursive
                
            }
            
         $image->move('uploads/slider',$imagename);   
        }
        else{
            //warna wou hee porane wle image
            //save hou agr update naa krae tou
            $imagename=$slider->image;
        }
        //Storing it in Database

        // $slider=new Slider();
        $slider->title=$request->title;
        $slider->sub_title=$request->sub_title;

        $slider->image=$imagename;
        $slider->save();

        return redirect()->route('slider.index')->
        with('successMsg','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::find($id);
        //Now if i wish to delete the image of Default.png which will be viewed if there is no image
        //you can do this
        
        if(file_exists('uploads/slider'.$slider->image)){
            unlink('uploads/slider'.$slider->image);
        }
        // unlink('uploads/slider/'.$slider->image);
        $slider->delete();
        return redirect()->back()->with('successMsg','Your Slider has been Deleted');
    }
}
