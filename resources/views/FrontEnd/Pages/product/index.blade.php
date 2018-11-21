
@extends('FrontEnd.layouts.master')
@section('content')



<!-- Start of Sidebar + Content -->

<div class="container margin-top-20">
  <div class="row">
    <!-- Start of Sidebar -->
    <div class="col-md-4">
  @include('FrontEnd/partials/product_sidebar')
<!-- end of Sidebar -->
    </div>
    <!-- Start of Middle Div -->
    <div class="col-md-8">

<!-- Start of widget Featured -->
      <div class="widget">
        <h3>Featured Product</h3>
        <div class="row">
          @foreach ($products as $products)
          <div class="col-md-3">
            <div class="card" >
              @php  $i=1;  @endphp
                @foreach ($products->images as $image)
              @if($i>0)
                <img class="card-img-top feature-img" src="{{asset('images/products/'.$image->image)}}" alt="Card image">
              @endif
                @php  $i--;  @endphp
                @endforeach
                <div class="card-body">
                  <h4 class="card-title">{{$products->title}}</h4>
                  <p class="card-text">Taka- {{$products->price}} BDT</p>
                  <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>
          </div>
          @endforeach



        </div>


      </div>
<!-- End of widget  Featured-->
<div class="widget">

</div>

    </div>
    <!-- End of Middle Div -->

  </div>

</div>

<!-- End  of Sidebar + Content -->


@endsection
