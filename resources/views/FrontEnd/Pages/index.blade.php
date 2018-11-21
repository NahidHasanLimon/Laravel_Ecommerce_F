
@extends('FrontEnd.layouts.master')
@section('content')



<!-- Start of Sidebar + Content -->

<div class="container margin-top-20">
  <div class="row">
    <!-- Start of Sidebar -->
    <div class="col-md-4">
      <div class="list-group">
 <a href="#" class="list-group-item list-group-item-action">First item</a>
 <a href="#" class="list-group-item list-group-item-action">Second item</a>
 <a href="#" class="list-group-item list-group-item-action">Third item</a>
</div>
<!-- end of Sidebar -->
    </div>
    <!-- Start of Middle Div -->
    <div class="col-md-8">

<!-- Start of widget Featured -->
      <div class="widget">
        <h3>Featured Product</h3>
        <div class="row">
          <div class="col-md-3">
            <div class="card" >
                <img class="card-img-top feature-img" src="{{asset('images/products/'.'limon.jpg')}}" alt="Card image">
                <div class="card-body">
                  <h4 class="card-title">Samsung</h4>
                  <p class="card-text">Taka- 5000</p>
                  <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="card" >
                <img class="card-img-top feature-img" src="{{asset('images/products/'.'limon.jpg')}}" alt="Card image">
                <div class="card-body">
                  <h4 class="card-title">Samsung</h4>
                  <p class="card-text">Taka- 5000</p>
                  <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="card" >
                <img class="card-img-top feature-img" src="{{asset('images/products/'.'limon.jpg')}}" alt="Card image">
                <div class="card-body">
                  <h4 class="card-title">Samsung</h4>
                  <p class="card-text">Take- 5000</p>
                  <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="card" >
                <img class="card-img-top feature-img" src="{{asset('images/products/'.'limon.jpg')}}" alt="Card image">
                <div class="card-body">
                  <h4 class="card-title">Samsung</h4>
                  <p class="card-text">Take- 5000</p>
                  <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="card" >
                <img class="card-img-top feature-img" src="{{asset('images/products/'.'limon.jpg')}}" alt="Card image">
                <div class="card-body">
                  <h4 class="card-title">Samsung</h4>
                  <p class="card-text">Take- 5000</p>
                  <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="card" >
                <img class="card-img-top feature-img" src="{{asset('images/products/'.'limon.jpg')}}" alt="Card image">
                <div class="card-body">
                  <h4 class="card-title">Samsung</h4>
                  <p class="card-text">Take- 5000</p>
                  <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>
          </div>
          <div class="col-md-3">
            <div class="card" >
                <img class="card-img-top feature-img" src="{{asset('images/products/'.'limon.jpg')}}" alt="Card image">
                <div class="card-body">
                  <h4 class="card-title">Samsung</h4>
                  <p class="card-text">Take- 5000</p>
                  <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
              </div>
          </div>
           <div class="col-md-3">
              <div class="card" >
                  <img class="card-img-top feature-img" src="{{asset('images/products/'.'limon.jpg')}}" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">Samsung</h4>
                    <p class="card-text">Take- 5000</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                  </div>
                </div>
            </div>


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
