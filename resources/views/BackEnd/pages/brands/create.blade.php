@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Add Product
      </div>


    <div class="card-body">
    <form action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
      <!-- {{ csrf_field()}}  or we can write-->
      @csrf
        @include('BackEnd.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Brand  Name">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80" placeholder="Enter Brand  Description">
    </textarea>
  </div>



  <div class="form-group">

   <label for="image">Brand  Images</label>

     <div class="row">

   <div class="com-md-4">
     <input type="file" class="form-control" name="image" id="image" placeholder="Enter Brand  Image">
   </div>
  </div>

 </div>
  <button type="submit" class="btn btn-primary">Add Brand</button>
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
