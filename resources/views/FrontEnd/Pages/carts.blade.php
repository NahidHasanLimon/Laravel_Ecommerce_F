@extends('FrontEnd.layouts.master')
@section('content')
<div class="container margin-top-20 mb-20">

  <h2>My Cart Items</h2>



<table class="table table-bordered table stripe">
  <thead>
    <tr>
      <th>No.</th>
      <th>Product Title</th>
      <th>Product Image</th>
      <th>Product Quantity</th>
      <th>Unit Price</th>
      <th>Sub Total Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
@php
$total_price=0;
@endphp
@foreach(App\Models\Cart::totalCarts() as $cart)
  <tr>
    <td>{{$loop->index+1}}</td>
  <td><a href="{{route('products.show',$cart->product->slug)}}">{{$cart->product->title}}</a></td>

    <td>

      @if($cart->product->images->count()>0)

         <a href="#">
           <img src="{{ asset('images/products/'.$cart->product->images->first()->image)  }}" alt="$cart->product->title-" width="60px">
         </a>
      @endif



     </td>
    <td>
      <form class="form-inline" action="{{  route('carts.update',$cart->id) }}" method="post">
        @csrf

      <input class="form-control"type="number" name="product_quantity" value="{{$cart->product_quantity}}"  >
      <button class="btn btn-success ml-2"type="submit" name="update">Update</button>
    </form>
  </td>
  <td>
      {{  $cart->product->price }} Taka
  </td>
  <td>
    @php
    $total_price +=$cart->product->price * $cart->product_quantity;
    @endphp
      {{  $cart->product->price * $cart->product_quantity }}
  </td>
  <td>
    <form class="form-inline" action="{{  route('carts.delete',$cart->id) }}" method="post">
      @csrf
    <input class="form-control"type="hidden" name="cart_id" value="">
    <button class="btn btn-danger "type="submit" name="delete"><i class="fas fa-cut"></i>Delete</button>
  </form>

  </td>
  </tr>
  @endforeach
  <tr>
    <td colspan="4"></td>
    <td colspan="">Total Ammount:</td>
    <td>{{$total_price}}</td>
  </tr>
    </tbody>

</table>
<div class="float-right">
  <a href="{{route('products')}}" class="btn btn-warning btn-lg"><i class="fas fa-cart-plus"></i>Continue Shopping</a>
  <a href="{{route('checkouts')}}" class="btn btn-info btn-lg">CheckOut</a>

</div>

</div>
@endsection
