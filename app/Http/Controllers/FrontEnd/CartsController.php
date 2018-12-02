<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Auth;


class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('FrontEnd.pages.carts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $this->validate($request,[
        'product_id'=>'required'
      ],
    [
      'product_id.required'=>'Please Select  a Product'

    ]);

    //Eliminate Same Product Double entry for Same User
    if (Auth::check()) {
      $cart= Cart::Where('user_id',Auth::id())
      ->Where('product_id',$request->product_id)
      ->first();
    } else {
    $cart= Cart::Where('ip_address',request()->ip())
    ->Where('product_id',$request->product_id)
    ->first();
  }
    if (!is_null($cart)) {
      $cart->increment('product_quantity');
    } else {
      $cart= new Cart;
      if (Auth::check()) {
        $cart->user_id=Auth::id();
      }
      $cart->ip_address=request()->ip();
      $cart->product_id=$request->product_id;
      $cart->save();
    }


        session()->flash('success','Product Has Added to cart !!');
        return back();

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
        //
        $cart=Cart::find($id);

        if (!is_null($cart)) {
          // $cart->delete();
           $cart->product_quantity=$request->product_quantity;
           $cart->save();
        } else {
          return redirect()->route('carts');
        }
        session()->flash('success','Carts updated SuccessFully');
        return back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cart=Cart::find($id);

      if (!is_null($cart)) {

         $cart->destroy($id);
      } else {
        return redirect()->route('carts');
      }
      session()->flash('success','Carts Deleted SuccessFully');
      return back();
    }
}
