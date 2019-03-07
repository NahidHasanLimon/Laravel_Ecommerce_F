<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Division;
use App\Models\District;


class DistrictsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    public function index()
    {
      $districts=District::orderBy('name','asc')->get();
      return view('BackEnd.pages.districts.index',compact('districts'));

    }
    public function create()
    {


      $divisions=Division::orderBy('id','desc')->get();
      return view('BackEnd.pages.districts.create',compact('divisions'));

    }


    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|max:255',
        'division_id' => 'required|max:255',



        ],
        [
          'name.required'=>'Please Provide A Brand Name',
          'division_id.required'=>'Please Provide division_id',

        ]
       );
         $division= new District;

         $division->name=$request->name;
         $division->division_id=$request->division_id;
         $division->save();
        session()->flash('success','District Added Successfully!!');
        return redirect()->route('admin.districts');

    }

// Satrting of Edit Code
public function edit($id)
{
  $divisions=Division::orderBy('priority','desc')->get();
  $districts=District::find($id);

    if (!is_null($districts)) {

      return view('BackEnd.pages.districts.edit',compact('districts','divisions'));
  }
  else {
      return redirect()->route('admin.districts');
  }
}

//end of Editing Code

//Satrt of  Update

public function update(Request $request, $id)
{
  $division= District::find($id);
//If Update NEw

    $request->validate([
    'name' => 'required|max:255',
    'division_id' => 'required|max:255',



    ],
    [
      'name.required'=>'Please Provide A Brand Name',
      'division_id.required'=>'Please Provide Yoyr District Division  ',

    ]);


     $division->name=$request->name;
     $division->division_id=$request->division_id;


     $division->save();
     return redirect()->route('admin.districts');

}








    public function delete($id)
    {
      $district=District::find($id);

      if (!is_null($district)) {
        $district->delete();
        session()->flash('success','District has Deleted Successfully!!');
        return back();

        }
        //Delete Just


    }



}
