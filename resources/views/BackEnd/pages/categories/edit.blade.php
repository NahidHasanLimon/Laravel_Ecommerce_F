@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Edit Product
      </div>


    <div class="card-body">
    <form action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
      @csrf
        @include('BackEnd.partials.messages')
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}" aria-describedby="emailHelp" >

    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80" >
    {{$category->description}}
    </textarea>
    </div>

    <div class="form-group">
    <label for="parentCategory">Parent Category</label>
    <select class="form-control" name="parent_id">
<option value="0" selected>Select Your Parent Category</option>
    @foreach($main_categories as $main_category)


      <option value="{{$main_category->id}}"{!! $main_category->id==$category->parent_id ? 'selected' : ' ' !!}> {!! $main_category->name!!}</option>

    @endforeach

      </select>

    </div>
    <div class="row">


    <div class="form-group col-md-4">
    <label for="exampleInputPassword1">Category Old Image</label><br>
    <img src="{!! asset('images/categories/'.$category->image) !!}" alt="No Images" height="50px" width="100">
  </div>
    <div class="form-group col-md-4">

    <label for="exampleInputPassword1">Insert Image</label><br>
    <input type="file" class="form-control" name="image" id="image">

    </div>

      </div>

    <button type="submit" class="btn btn-success">Update  Category</button>
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
