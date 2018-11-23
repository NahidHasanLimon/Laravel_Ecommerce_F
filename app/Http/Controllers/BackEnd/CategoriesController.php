<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Image;
use File;
class CategoriesController extends Controller
{

    public function index()
    {
      $categories=Category::orderBy('id','desc')->get();
      return view('BackEnd.pages.categories.index',compact('categories'));

    }
    public function create()
    {
      $main_categories=Category::orderBy('name','desc')->where('parent_id',0)->get();

      return view('BackEnd.pages.categories.create',compact('main_categories'));

    }


    public function store(Request $request)
    {
      $request->validate([
      'name' => 'required|max:255',

        'image' => 'required|image',

      ],
      [
        'name.required'=>'Please Provide A Category Name',
        'image.image' =>'Please Provide A Valid Image  with JPG,JPEG,PNG Extension',
      ]
    );
         $category= new Category;

         $category->name=$request->name;
         $category->description=$request->description;
         $category->parent_id=$request->parent_id;

          // only for one image
          //Insert image into ProductImages and Location

          if ($request->hasFile('image')) {
            // Insert That Images into location
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location= public_path('images/categories/'.$img);
            // Import Intervention Image CLass for image Save in location
            Image::make($image)->save($location);
            $category->image=$img;

            $category->save();
            session()->flash('success','Category Added Successfully!!');
            return redirect()->route('admin.categories');

          }
          // End of one image


    }

// Satrting of Edit Code
public function edit($id)
{
  $category=Category::find($id);

    if (!is_null($category)) {
      $main_categories=Category::orderBy('name','desc')->where('parent_id',0)->get();
      return view('BackEnd.pages.categories.edit',compact('main_categories','category'));
  }
  else {
      return redirect()->route('admin.categories');
  }
}

//end of Editing Code

//Satrt of  Update

public function update(Request $request,$id)
{
  $request->validate([
  'name' => 'required|max:255',

    'image' => 'required|image',

  ],
  [
    'name.required'=>'Please Provide A Category Name',
    'image.image' =>'Please Provide A Valid Image  with JPG,JPEG,PNG Extension',
  ]);
     $category= Category::find($id);

     $category->name=$request->name;
     $category->description=$request->description;
     $category->parent_id=$request->parent_id;

      // only for one image
      //Insert image into ProductImages and Location

   if (count($request->image) > 0) {
    if (File::exists('images/categories/'.$category->image)) {
      File::delete('images/categories/'.$category->image);
    }
    $image=$request->file('image');
    $img=time() .'.'.$image->getClientOriginalExtension();
    $location=public_path('images/categories/'.$img);
    Image::make($image)->save($location);
    $category->image=$img;
   }
   $category->save();
   return redirect()->route('admin.categories');

}








    public function delete($id)
    {
      $category=Category::find($id);

      if (!is_null($category)) {
        //if it is primary category then delete its all sub categories
        if ($category->parent_id==0) {
          $sub_categories=Category::orderBy('name','desc')->where('parent_id',$category->id)->get();
          foreach ($sub_categories as $sub_cat) {
            // Delete All Sub Category Image
            if (File::exists('images/categories/'.$sub_cat->image)) {
              File::delete('images/categories/'.$sub_cat->image);
            }
            $sub_cat->delete();
          }
        }
        //Delete Category Image
        if (File::exists('images/categories/'.$category->image)) {
          File::delete('images/categories/'.$category->image);
        }
        //Delete Just Category
      $category->delete();
      session()->flash('success','Category Deleted Successfully!!');
      return back();

    }

}

}
