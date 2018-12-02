<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
  public $fillable=[
    'product_id',
    'user_id',
    'order_id',
    'ip_address',
    'product_quantity'

  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function order()
  {
    return $this->belongsTo(Order::class);
  }
  // $carts= Carts::orWhere('user_id',Auth::id())
  // ->orWhere('ip_address',request()->ip())
  // ->Where('product_id',$request->product_id)
  // ->first();
  public function product()
  {
    return $this->belongsTo(Product::class);
  }
/**Total Carts in tehe Cart
*@return integer total cart model
*/

  public static function totalCarts ()
  {
    // $carts="";
    if (Auth::check() ) {
      $carts= Cart::Where('user_id',Auth::id())

      ->where('order_id',NULL)
      ->get();

    }
    else {
      $carts= Cart::Where('ip_address',request()->ip())->where('order_id',NULL)->get();

    }
     return $carts;



  }

  public static function totalItems()
  {
    if (Auth::check() ) {
      $carts= Cart::Where('user_id',Auth::id())

      ->where('order_id',NULL)
      ->get();

    } else {
      $carts= Cart::Where('ip_address',request()->ip())->where('order_id',NULL)->get();

    }
    $total_item=0;
  foreach ($carts as $cart) {
  $total_item +=$cart->product_quantity;
  }
  return $total_item;



  }
}
