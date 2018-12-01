
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
        <h3> <span class="badge badge-info"><a href="{{route('categories.show',$category->id)}}">{{$category->name }}</a></span> <b> Products </b></h3>
@php
$products=$category->products()->paginate(6);
@endphp
@if($products->count()> 0)
        @include('FrontEnd.pages.product.partials.all_products')
@else
<div class="alert alert-warning">
  No Product Available for this Category
</div>
@endif
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
