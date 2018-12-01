@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Add Product
      </div>


    <div class="card-body">
    <form action="{{route('admin.district.store')}}" method="post" enctype="multipart/form-data">
      <!-- {{ csrf_field()}}  or we can write-->
      @csrf
        @include('BackEnd.partials.messages')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Division  Name">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Division</label>
    <select class="form-control" name="division_id">
      <option value="">Select Your Division</option>
      @foreach($divisions as $division)
      <option value="{{$division->id}}">{{ $division->name}}</option>
      @endforeach
    </select>

  </div>





  <button type="submit" class="btn btn-primary">Add Division</button>
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
