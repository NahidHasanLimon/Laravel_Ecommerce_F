@extends('BackEnd.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        View Order
      </div>
      <div class="card-body">
        @include('BackEnd.partials.messages')
        <div class="row">
          <div class="col-md-6 border-right">
              <p ><strong>Orderer ID:  </strong>{{$order->id}}</p>
              <hr>
              <p ><strong>Orderer Name:  </strong>{{$order->name}}</p>
              <hr>
              <p><strong>Orderer Phone: </strong>{{$order->phone_no}}</p>
              <hr>
              <p><strong>Orderer Email: </strong>{{$order->name}}</p>
              <hr>
              <p><strong>Orderer Shipping Address:  </strong>{{$order->shipping_address}}</p>
              <hr>
          </div>
          <div class="col-md-6">
            <hr>
            <p><strong> Order Payment Method : </strong> {{$order->payment->name}}</p>
            <p><strong> Transaction ID  : </strong> {{$order->transaction_id}}</p>
            <!-- <p><strong> Order Completion Status   : </strong> @if($order->is_completed)Completed @else Uncompleted @endif</p> -->
            <p><strong> Order Completion Status   : </strong> {!! $order->is_completed ? 'Completed' : ' Uncompleted' !!}></p>
            <p><strong> Order Completion Status   : </strong> {!! $order->is_paid ? 'Paid' : 'Unpaid' !!} </p>
            <hr>
          </div>
        </div>
        <hr>
        <h2>Ordered Items</h2>
        @if($order->carts->count()>0)
        <table class="table table-bordered table stripe" id="dataTable">
          <thead>
            <tr>
              <th>No.</th>
              <th>Product Title</th>
              <th>Product Image</th>
              <th>Product Quantity</th>
              <th>Unit Price(Taka)</th>
              <th>Sub Total Price(Taka)</th>
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

              <input class="form-control"type="number" name="product_quantity" value="{{$cart->product_quantity}}" style="width:65px;" >
              <button class="btn btn-success sm-2"type="submit" name="update" style="width:75px;">Update</button>
            </form>
          </td>
          <td>
              {{  $cart->product->price }}
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

            </tbody>
            <tfoot>
              <tr>
                <th><hr></th>
                <th> </th>
                <th> </th>
                <th> </th>
                <th>Total Amount(Taka)</th>
                <th>{{$total_price}} </th>
                <th></th>
              </tr>
            </tfoot>
        </table>
        @else
        <p>No Item In Order List</p>
      @endif
      <hr>
      <form class="formStyle" action="{{route('admin.order.completed',$order->id)}}" method="post" style="display: inline-block!important;">
        @csrf
        @if($order->is_completed)
        <input type="submit" name="submit" value="Cancel Order"class="btn btn-danger">
          @else
          <input type="submit" name="submit" value="Complete Order"class="btn btn-success">
          @endif
      </form>
      <form class="formStyle" action="{{route('admin.order.paid',$order->id)}}" method="post"style="display: inline-block!important;">
        @csrf
        @if($order->is_paid)
        <input type="submit" name="submit" value="Unpaid Order"class="btn btn-danger">
          @else
          <input type="submit" name="submit" value="Paid Order"class="btn btn-success">
          @endif

      </form>
      </div>

    </div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
