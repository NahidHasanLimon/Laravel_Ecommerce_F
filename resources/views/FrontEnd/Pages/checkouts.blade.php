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
  @php
  $discount=App\Models\Settings::first()->discount;
  $total_price -=$shipping_cost;
  @endphp
  <td class="right">{{$discount}}</td>
  </tr>
  <tr>
  <td class="left">
   <strong>Shipping Cost ()</strong>
  </td>
  @php
  $shipping_cost=App\Models\Settings::first()->shipping_cost;
  $total_price +=$shipping_cost;
  @endphp
  <td class="right">{{$shipping_cost}}</td>
  </tr>
  <tr>
  <td class="left">
   <strong>Vat()</strong>
  </td>
  @php
  $vat=App\Models\Settings::first()->vat;
  $total_price -=$vat;
  @endphp
  <td class="right">{{$vat}}</td>
  </tr>
  <tr>
  <td class="left">
  <strong>Total</strong>
  </td>
<!-- </tr>
  <tr> -->
  <td class="right">
  <strong>{{$total_price}}</strong>
  </td>
  </tr>
  </tbody>
  </table>
<span class="border-top my-3"></span>
  </div>

  </div>

  </div>
  <!-- Shhippin Address -->
  <div class="row mb-4 border border-light">
  <div class="col-sm-6">
      <h6 class="mb-3"><strong>Shipping Address:</strong></h6>

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





  </div>

  <div class="col-sm-6">
  <h6 class="mb-3"><strong>Payment Method:</strong></h6>
  <div class="form-group row">
      <label for="District" class="col-md-4 col-form-label text-md-right">{{ __('Select A Payment Method') }}</label>

      <div class="col-md-6">
        <select class="form-control" name="payments" id="payments" class="form-control">
          <option value="">Select Your Payment Method</option>
          @foreach($payments as $payment)
          <option value="{{ $payment->short_name }}" > {{ $payment->name}}</option>
          @endforeach
        </select>

      </div>
  </div>
  <!-- Start After Select  -->
    @foreach($payments as $payment)
    <!-- -{{$payment->short_name}} -->
<div class="container text-light bg-dark">


    @if ($payment->short_name=="CashIn")
   <div id="payment_{{$payment->short_name}}"class="hidden mb-3 pt-20">
    <p>Click to finish Order</p>
       <small>The Product Delivery Accomplished Within Two Working days</small>
     </div>
       @else
       <div id="payment_{{$payment->short_name}}"class="hidden mb-3">
       <h3>{{$payment->name}}</h3>
      <p>
        <strong>{{$payment->name}} No: {{$payment->no}}</strong><br>
        <strong>Payment Type: {{$payment->type}}</strong><br>
      </p>
      <div class="alert alert-success">
        please send Money and Give Your Transaction Number:
      </div>
      <input type="text" name="" id="transaction_id" class="form-control" value=""placeholder="Enter Your Transaction ID or Code">
    </div>
    @endif
    </div>


    @endforeach
  <!-- End After Select  -->


  <div class="form-group row mb-0 mt-3">
      <div class="col-md-6 offset-md-4">
          <a href="{{route('carts')}}" class="btn btn-info"><i class="fas fa-angle-double-down"></i>Update Cart</a>

          <button type="submit" class="btn btn-warning">
            finish Order
          </button>
      </div>
  </div>

  </div>
</form>
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
      @section('Customized_scripts')

      <script type="text/javascript">
        $("#payments").change(function(){
          $payment_method=$("#payments").val();
          if ($payment_method=="CashIn") {
            $("#payment_CashIn").removeClass('hidden');
            $("#payment_Bkash").addClass('hidden');
            $("#payment_Rocket").addClass('hidden');

          } else if($payment_method=="Bkash") {
            $("#payment_Bkash").removeClass('hidden');
              $("#payment_CashIn").addClass('hidden');
              $("#payment_Rocket").addClass('hidden');
          } else if($payment_method=="Rocket") {
            $("#payment_Rocket").removeClass('hidden');
              $("#payment_CashIn").addClass('hidden');
                $("#payment_Bkash").addClass('hidden');
          }

        })
      </script>
  @endsection
