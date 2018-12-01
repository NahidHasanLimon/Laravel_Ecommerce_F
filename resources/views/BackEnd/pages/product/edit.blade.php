@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Edit Product
      </div>


    <div class="card-body">
    <form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
        @include('BackEnd.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{$product->title}}">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80" >
      {{$product->desscription}}
    </textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">quantity</label>
    <input type="number" class="form-control" name="quantity" id="quantity" value="{{$product->quantity}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Select Your Category</label>
   <select class="form-control" name="category_id">
    <option value="0">Please Select your Category</option>
    @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',0)->get() as $parent_category )

    <option value="{{  $parent_category->id   }}" {{ $product->category_id==$parent_category->id ? 'selected' : ' ' }} >{{  $parent_category->name  }}</option>

        @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',$parent_category->id)->get() as $child_category )

          <option value="{{  $child_category->id   }}" {{ $product->category_id==$child_category->id ? 'selected' : ' ' }}>- - - > {{  $child_category->name  }}</option>
          @endforeach
    @endforeach
  </select>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Select Your Brand</label>
  <select class="form-control" name="brand_id">
    <option value="0">Please Select your Brand</option>

    @foreach (App\Models\Brand::orderBy('name','asc')->get() as $brand )

    <option value="{{  $brand->id   }}" {{ $product->brand_id==$brand->id ? 'selected' : ' ' }} >{{  $brand->name  }}</option>


    @endforeach
  </select>
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
  <button type="submit" class="btn btn-primary">Update Product</button>
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
