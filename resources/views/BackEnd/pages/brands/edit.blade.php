@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Edit Brand
      </div>


    <div class="card-body">
    <form action="{{route('admin.brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
      @csrf
        @include('BackEnd.partials.messages')
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$brand->name}}" aria-describedby="emailHelp" >

    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80" >
    {{$brand->description}}
    </textarea>
    </div>


    <div class="row">

    <div class="form-group col-md-4">
    <label for="exampleInputPassword1">Brand Old Image</label><br>
    <img src="{!! asset('images/brands/'.$brand->image) !!}" alt="No Images" height="50px" width="100">
  </div>
    <div class="form-group col-md-4">

    <label for="exampleInputPassword1">Insert Image</label><br>
    <input type="file" class="form-control" name="image" id="image">

    </div>

      </div>

  <button type="submit" class="btn btn-success lg">Update  Brand</button> 
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
