<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Brand;
use Image;
use File;
class BrandsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

    public function index()
    {
      $brands=Brand::orderBy('id','desc')->get();
      return view('BackEnd.pages.brands.index',compact('brands'));

    }
    public function create()
    {
      $main_brands=Brand::orderBy('name','desc')->get();

      return view('BackEnd.pages.brands.create');

    }


    public function store(Request $request)
    {
      $request->validate([
      'name' => 'required|max:255',
      'description' => 'required|max:255',



      ],
      [
        'name.required'=>'Please Provide A Brand Name',
        'description.required'=>'Please Provide A Brand Description',

      ]
    );
         $brand= new Brand;

         $brand->name=$request->name;
         $brand->description=$request->description;


          // only for one image
          //Insert image into ProductImages and Location

          if ($request->hasFile('image')) {
            // Insert That Images into location
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location= public_path('images/brands/'.$img);
            // Import Intervention Image CLass for image Save in location
            Image::make($image)->save($location);
            $brand->image=$img;

            $brand->save();
            session()->flash('success','Brand Added Successfully!!');
            return redirect()->route('admin.brands');

          }
          // End of one image


    }

// Satrting of Edit Code
public function edit($id)
{
  $brand=Brand::find($id);

    if (!is_null($brand)) {

      return view('BackEnd.pages.brands.edit',compact('brand'));
  }
  else {
      return redirect()->route('admin.brands');
  }
}

//end of Editing Code

//Satrt of  Update

public function update(Request $request, $id)
{
  $brand= Brand::find($id);
//If Update NEw

    $request->validate([
    'name' => 'required|max:255',



    ],
    [
      'name.required'=>'Please Provide A Brand Name',

    ]);

    if (count($request->image) > 0) {
     if (File::exists('images/brands/'.$brand->image)) {
       File::delete('images/brands/'.$brand->image);
     }
     $image=$request->file('image');
     $img=time() .'.'.$image->getClientOriginalExtension();
     $location=public_path('images/brands/'.$img);
     Image::make($image)->save($location);
     $brand->image=$img;
    }






     $brand->name=$request->name;
     $brand->description=$request->description;
     $brand->image=$brand->image;


      // only for one image
      //Insert image into ProductImages and Location


   $brand->save();
   return redirect()->route('admin.brands');

}








    public function delete($id)
    {
      $brand=Brand::find($id);

      if (!is_null($brand)) {


        }
        //Delete Just Brand
      $brand->delete();
      session()->flash('success','Brand has Deleted Successfully!!');
      return back();

    }



}
