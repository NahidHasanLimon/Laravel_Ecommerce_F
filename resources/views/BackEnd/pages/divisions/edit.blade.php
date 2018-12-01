@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Edit Brand
      </div>


    <div class="card-body">
    <form action="{{route('admin.division.update',$division->id)}}" method="post" enctype="multipart/form-data">
      @csrf
        @include('BackEnd.partials.messages')
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$division->name}}" aria-describedby="emailHelp" >

    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Priority</label>
    <input type="text" class="form-control" name="priority" id="priority" value="{{$division->priority}}" aria-describedby="emailHelp" >

    </div>





  <button type="submit" class="btn btn-success lg">Update  Division</button>
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
