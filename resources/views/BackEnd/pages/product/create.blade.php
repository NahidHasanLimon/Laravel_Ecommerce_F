@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Add Product
      </div>


    <div class="card-body">
    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field()}}
        @include('BackEnd.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter Product Tile">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80" placeholder="Enter your Description">
    </textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">quantity</label>
    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Product quantity">
  </div>
  <!--Only For One Image
   <div class="form-group">
    <label for="exampleInputPassword1">Product Images</label>
    <input type="file" class="form-control" name="product_image" id="product_image" placeholder="Enter Product Price">
  </div> -->
  <div class="form-group">

   <label for="exampleInputPassword1">Product Images</label>

     <div class="row">
   <div class="com-md-4">
     <input type="file" class="form-control" name="product_image[]" id="product_image" placeholder="Enter Product Price">
   </div>
   <div class="com-md-4">
     <input type="file" class="form-control" name="product_image[]" id="product_image" placeholder="Enter Product Price">
   </div>
   <div class="com-md-4">
     <input type="file" class="form-control" name="product_image[]" id="product_image" placeholder="Enter Product Price">
   </div>
   <div class="com-md-4">
     <input type="file" class="form-control" name="product_image[]" id="product_image" placeholder="Enter Product Price">
   </div>
   <div class="com-md-4">
     <input type="file" class="form-control" name="product_image[]" id="product_image" placeholder="Enter Product Price">
   </div>
  </div>

 </div>
  <button type="submit" class="btn btn-primary">add Product</button>
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
