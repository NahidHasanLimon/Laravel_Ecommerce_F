@extends('FrontEnd.layouts.master')
@section('content')
<div class="container margin-top-20">


<div class="" id="Print_Div">
  <div class="container">
    <div class="card">
  <div class="card-header">
  Invoice
  <strong>01/01/01/2018</strong>
    <span class="float-right"> <strong>Status:</strong> Pending</span>

  </div>
  <div class="card-body">


  <div class="table-responsive-sm">
  <table class="table table-striped">
  <thead>
  <tr>
  <th class="center">#</th>
  <th>Item</th>
  <th>Description</th>

  <th class="right">Unit Cost</th>
    <th class="center">Qty</th>
  <th class="right">Total</th>
  </tr>
  </thead>
  <tbody>
    @php
    $total_price=0;
    @endphp
    @foreach(App\Models\Cart::totalCarts() as $cart)
  <tr>
  <td class="center">{{$loop->index+1}}</td>
  <td class="left strong">
    {{$cart->product->title}}

  </td>
  <td class="left">
  {{substr($cart->product->desscription, 0, 40)}}
  </td>

  <td class="right">  {{$cart->product->price}} Taka</td>
    <td class="center">{{$cart->product_quantity}}</td>
  <td class="right">
    @php
  $total_price +=$cart->product->price * $cart->product_quantity;
  @endphp
    {{  $cart->product->price * $cart->product_quantity }}</td>
  </tr>
  @endforeach
  </tbody>
  </table>
  </div>

  <div class="row">
  <div class="col-lg-4 col-sm-5">

  </div>

  <div class="col-lg-4 col-sm-5 ml-auto">
  <table class="table table-clear">
  <tbody>
  <tr>

  <td class="left">
  <strong>Subtotal</strong>
  </td>
  <td class="right">{{$total_price}}</td>
  </tr>
  <tr>
  <td class="left">
  <strong>Discount (0.0%)</strong>
  </td>
  <td class="right">{{$total_price}}</td>
  </tr>
  <tr>
  <td class="left">
   <strong>Shipping Cost ()</strong>
  </td>
  <td class="right">100</td>
  </tr>
  <tr>
  <td class="left">
  <strong>Total</strong>
  </td>
  <td class="right">
  <strong>$7.477,36</strong>
  </td>
  </tr>
  </tbody>
  </table>

  </div>

  </div>

  </div>
  <!-- Shhippin Address -->
  <div class="row mb-4">
  <div class="col-sm-6">
    <form method="POST" action="{{ route('user.profile.update') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reciever  Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::check() ? Auth::user()->first_name.''.Auth::user()->last_name : ''}}" required autofocus>


            </div>
        </div>


        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{Auth::check() ? Auth::user()->email : '' }}" required>


            </div>
        </div>
        <div class="form-group row">
            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

            <div class="col-md-6">
                <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : ''  }}" required autofocus>


            </div>
        </div>

        <div class="form-group row">
            <label for="street_Address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

            <div class="col-md-6">
                <textarea rows="4" id="street_Address" type="text" class="form-control" name="shipping_address"  required autofocus>
                  {{Auth::check() ? Auth::user()->shipping_address : '' }}
                </textarea>

            </div>
        </div>


    </form>
  </div>

  <div class="col-sm-6">
  <h6 class="mb-3">To:</h6>
  <div>
  <strong>Bob Mart</strong>
  </div>
  <div>Attn: Daniel Marek</div>
  <div>43-190 Mikolow, Poland</div>
  <div>Email: marek@daniel.com</div>
  <div>Phone: +48 123 456 789</div>
  </div>



  </div>
  <!-- End of Shiiping Address -->
  </div>
  <!-- End of Cart -->
  </div>
  <!-- end of container -->



</div>
<!-- End of Div Print -->



</div>
@endsection
