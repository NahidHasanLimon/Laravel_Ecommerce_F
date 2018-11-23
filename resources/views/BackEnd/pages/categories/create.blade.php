@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Add Product
      </div>


    <div class="card-body">
    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
      <!-- {{ csrf_field()}}  or we can write-->
      @csrf
        @include('BackEnd.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Tile">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80" placeholder="Enter your Description">
    </textarea>
  </div>
  <div class="form-group">
    <label for="parentCategory">Parent Category</label>
    <select class="form-control" name="parent_id">
      <option value="0" selected>Select Parent Category</option>
    @foreach($main_categories as $main_category)

      <option value="{{$main_category->id}}">{{$main_category->name}}</option>

    @endforeach
      </select>

  </div>

  <!--Only For One Image
   <div class="form-group">
    <label for="exampleInputPassword1">Product Images</label>
    <input type="file" class="form-control" name="product_image" id="product_image" placeholder="Enter Product Price">
  </div> -->
  <div class="form-group">

   <label for="image">Category Images</label>

     <div class="row">

   <div class="com-md-4">
     <input type="file" class="form-control" name="image" id="image" placeholder="Enter Category Image">
   </div>
  </div>

 </div>
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
