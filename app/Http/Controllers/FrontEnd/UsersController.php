<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use App\Models\Division;
use App\Models\District;



class UsersController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function dashboard()
    {
      $user=Auth::user();

      return view('FrontEnd.pages.users.dashboard',compact('user'));
    }
    public function profile()
    {
      $divisions=Division::orderBy('id','desc')->get();
       $districts=District::orderBy('name','asc')->get();

      $user=Auth::user();

      return view('FrontEnd.pages.users.profile',compact('user','districts','divisions'));
    }


    public function profileUpdate(Request $request)
    {
      $user=Auth::user();
      $this->validate($request,[
        'first_name' => 'required|string|max:30',
        'last_name' => 'nullable|string|max:30',
        'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,

        'username' => 'required|string|max:20|unique:users,username,'.$user->id,
        'division_id' => 'required|numeric',
        'district_id' => 'required|numeric',
        'phone_no' => 'required|unique:users,phone_no,'.$user->id,
        'street_address' => 'required|max:100',
        'shipping_address' => 'max:100',

        'passowrd' => 'string|min:6',

    ]);






        $user->first_name= $request->first_name;
        $user->last_name= $request->last_name;
        $user->username= $request->username;
        $user->street_Address= $request->street_address;
        $user->shipping_address= $request->shipping_address;
        $user->ip_address= request()->ip();
        $user->division_id= $request->division_id;
        $user->district_id= $request->district_id;
        $user->email= $request->email;
        if ($request->passowrd !=NULL || $request->password !="") {
              $user->password=Hash::make( $request->password);
        }

        $user->save();
       session()->flash('success','Your  Profile Updated Successfully ');
      return back();



    }


}
