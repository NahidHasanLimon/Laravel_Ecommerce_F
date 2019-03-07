<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders= Order::orderBy('id','desc')->get();

      return view('BackEnd.pages.orders.index',compact('orders'));
    }
    public function show($id)
    {
      $order= Order::find($id);
      if ($order!=null) {
      $order->is_seen_by_admin=1;
      $order->save();
      }
      return view('BackEnd.pages.orders.show',compact('order'));

    }
    public function paid($id)
    {
      $order= Order::find($id);
      if ($order->is_paid) {
        $order->is_paid=0;


      }else {
          $order->is_paid=1;

      }
        $order->save();
        session()->flash('success','Order Paid Status Successfully');

      return back();

    }
    public function completed($id)
    {
      $order= Order::find($id);
      if ($order->is_completed) {
        $order->is_completed=0;


      }else {
          $order->is_completed=1;

      }
        $order->save();
        session()->flash('success','Order Completion State Changed  !! Susseccsfully!!');

      return back();

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
          $order= Order::find($id);
          if ($order!=null) {
          $order->delete();
            session()->flash('success','Order Deleted !! Susseccsfully!!');
            return back();
          }
    }
}
