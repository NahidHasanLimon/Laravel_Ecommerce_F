
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
        <h3>All Products</h3>
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
