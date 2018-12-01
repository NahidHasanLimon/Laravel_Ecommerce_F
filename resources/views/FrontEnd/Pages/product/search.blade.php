
@extends('FrontEnd.layouts.master')
@section('content')



<!-- Start of Sidebar + Content -->

<div class="container margin-top-20">
  <div class="row">
    <!-- Start of Sidebar -->
    <div class="col-md-4">
      @include('FrontEnd.partials.product_sidebar')
<!-- end of Sidebar -->
    </div>
    <!-- Start of Middle Div -->
    <div class="col-md-8">

<!-- Start of widget Featured -->
      <div class="widget">
        <h3>You Searched For :<span class="badge badge-primary">{{$search}}</span> </h3>
              @include('FrontEnd.pages.product.partials.all_products')


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
