
@extends('FrontEnd.layouts.master')
@section('title')
{{$product->title}}||Ecommerce Site
@endsection
@section('content')



<!-- Start of Sidebar + Content -->

<div class="container margin-top-20">
  <div class="row">
    <!-- Start of Sidebar -->
    <div class="col-md-4">

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @php
          $i=1;
          @endphp

          @foreach($product->images as $image)
          <div class="product-item carousel-item  {{ $i==1? 'active':''  }}" >
            <img class="d-block w-100" src=" {{ asset('images/products/'.$image->image) }}" alt="First slide">
          </div>

          @php $i++;  @endphp

          @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

<!-- end of Sidebar -->
    </div>

    <!-- Start of Middle Div -->
    <div class="col-md-8">

<!-- Start of widget Featured -->
      <div class="widget">
        <h3 class="card-title"> {{$product->title}}<br></h3>
        <p><mark>Category: <span class="badge badge-info">{{$product->category->name}}</mark></span><br>
        <mark>Brand: <span class="badge badge-info">{{$product->brand->name}}</mark><span><br>
       <h5>{{$product->price}} Taka</h5>
       <h4>
         <span class="badge badge-primary">
           {{$product->quantity<1? 'No Items Available':$product->quantity.' in Stock ' }}
         </span>
       </h4></p>

        <h3 class="card card-body">{{$product->desscription}}</h3>



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
