<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Image;
use File;

use App\Models\Productimage;

class  ProductsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  public function index()
  {
    $products=Product::orderBy('id','desc')->get();
    return view('BackEnd.pages.product.index')->with('products',$products);
  }
  public function create()
  {

       return view('BackEnd.pages.product.create');
  }

  public function edit($id)
  {
    $products=Product::find($id);
    return view('BackEnd.pages.product.edit')->with('product',$products);
  }
  public function delete($id)
  {
    $product=Product::find($id);
  if (!is_null($product)) {
    if (File::exists('images/products/'.$product->images->image)) {
      File::delete('images/products/'.$product->images->image);
    }
    $product->delete();


  }
  session()->flash('success','Product Deleted Successfully!!');

  return back();

  }

  public function store(Request $request)
  {
    $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'price' => 'required|numeric',
      'quantity' => 'required|numeric',
      'category_id' => 'required|numeric',
      'brand_id' => 'required|numeric',

]);
       $product= new Product;

       $product->title=$request->title;
       $product->desscription=$request->description;
       $product->price=$request->price;
       $product->quantity=$request->quantity;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->admin_id=1;
        $product->slug=str_slug($request->title);
        $product->save();
        // only for one image
        // //Insert image into ProductImages and Location
        // if ($request->hasFile('product_image')) {
        //   // Insert That Images into location
        //   $image=$request->file('product_image');
        //   $img=time().'.'.$image->getClientOriginalExtension();
        //   $location= public_path('images/products/'.$img);
        //   // Import Intervention Image CLass for image Save in location
        //   Image::make($image)->save($location);
        //
        //         // Insert That Images into  databse productimage table
        //      // Import  Productimage Class
        //           $product_image= new Productimage;
        //           $product_image->product_id=$product->id;
        //           $product_image->image=$img;
        //           $product_image->save();
        //
        // }
        // End of one image

        if (count($request->product_image)>0) {
          foreach ($request->product_image as $image) {

              // Insert That Images into location

              $img=time().'.'.$image->getClientOriginalExtension();
              $location= public_path('images/products/'.$img);
              // Import Intervention Image CLass for image Save in location
              Image::make($image)->save($location);

                    // Insert That Images into  databse productimage table
                 // Import  Productimage Class
                      $product_image= new Productimage;
                      $product_image->product_id=$product->id;
                      $product_image->image=$img;
                      $product_image->save();



          }

        }
        session()->flash('success','Product Added Successfully!!');
        return redirect()->route('admin.product.create');




  }

  public function update(Request $request,$id)
  {

    $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
      'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'category_id' => 'required|numeric',
        'brand_id' => 'required|numeric',

]);


        $product=Product::find($id);

       $product->title=$request->title;
       $product->desscription=$request->description;
       $product->price=$request->price;
       $product->quantity=$request->quantity;
       $product->category_id=$request->category_id;
       $product->brand_id=$request->brand_id;

      $product->save();



        return redirect()->route('admin.products');



  }
}
