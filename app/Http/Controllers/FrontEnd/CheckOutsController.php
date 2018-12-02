<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Settings;
use App\Models\Order;
use App\Models\Cart;
Use Auth;


class CheckOutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $payments= Payment::orderBy('priority','asc')->get();
      // $settings= Settings::orderBy('id','asc')->get();
        return view('FrontEnd.pages.checkouts',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
          'name'=>'required',
          'phone_no'=>'required',
          'shipping_address'=>'required',
          'payment_method_id'=>'required',
        ]);
        $order= new Order();
        if ($request->payment_method_id!='CashIn') {
          if ($request->transaction_id==NULL || empty($request->transaction_id)) {
            session()->flash('error','Please Give Your Transaction ID');
            return back();
          }
        }
        $order->name=$request->name;
        $order->email=$request->email;
        $order->phone_no=$request->phone_no;
        $order->shipping_address=$request->shipping_address;
        $order->message=$request->message;
        $order->transaction_id=$request->transaction_id;
        $order->ip_address=request()->ip();
        if (Auth::check()) {
            $order->user_id=Auth::id();

        }
        $catchPaymentID=Payment::where('short_name',$request->payment_method_id)->first()->id;
          // dd($catchPaymentID);
      $order->payment_id=$catchPaymentID;

      $order->save();
      // Now Add Order ID To Cart Product  After Saving Order
      foreach (Cart::totalCarts() as $cart) {
        $cart->order_id=$order->id;
        $cart->save();
      }

      session()->flash('success','Order Completed Successfull!! Wait Admin will Confirm You !!');
      return redirect()->route('index');



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


}
