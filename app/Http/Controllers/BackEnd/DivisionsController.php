<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Division;
use Image;
use File;
class DivisionsController extends Controller
{

    public function index()
    {
      $divisions=Division::orderBy('priority','desc')->get();
      return view('BackEnd.pages.divisions.index',compact('divisions'));

    }
    public function create()
    {


      return view('BackEnd.pages.divisions.create');

    }


    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|max:255',
        'priority' => 'required|max:255',



        ],
        [
          'name.required'=>'Please Provide A Brand Name',
          'priority.required'=>'Please Provide Priority',

        ]
       );
         $division= new Division;

         $division->name=$request->name;
         $division->priority=$request->priority;
         $division->save();
        session()->flash('success','Division Added Successfully!!');
        return redirect()->route('admin.divisions');

    }

// Satrting of Edit Code
public function edit($id)
{
  $division=Division::find($id);

    if (!is_null($division)) {

      return view('BackEnd.pages.divisions.edit',compact('division'));
  }
  else {
      return redirect()->route('admin.divisions');
  }
}

//end of Editing Code

//Satrt of  Update

public function update(Request $request, $id)
{
  $division= Division::find($id);
//If Update NEw

    $request->validate([
    'name' => 'required|max:255',
    'priority' => 'required|max:255',



    ],
    [
      'name.required'=>'Please Provide A Brand Name',
      'name.required'=>'Please Provide Division Priorty ',

    ]);


     $division->name=$request->name;
     $division->priority=$request->priority;


     $division->save();
     return redirect()->route('admin.divisions');

}








    public function delete($id)
    {
      $division=Division::find($id);

      if (!is_null($division)) {
        $district=District::where('division_id',$division->id)->get();
        foreach ($districts as $district) {
          $district->delete();
        }


        }
        //Delete Just Brand
      $division->delete();
      session()->flash('success','Division has Deleted Successfully!!');
      return back();

    }



}
