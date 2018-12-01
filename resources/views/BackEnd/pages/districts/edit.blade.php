@extends('BackEnd.layouts.master')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Edit Brand
      </div>


    <div class="card-body">
    <form action="{{route('admin.district.update',$districts->id)}}" method="post" enctype="multipart/form-data">
      @csrf
        @include('BackEnd.partials.messages')
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$districts->name}}" aria-describedby="emailHelp" >

    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Division</label>
    <select class="form-control" name="division_id">
      <option value="">Select Your Division</option>
      @foreach($divisions as $division)
      <option value="{{$division->id}}" {!! $districts->division_id==$division->id ? 'selected' : ' ' !!}> {{ $division->name}}</option>
      @endforeach
    </select>
    </div>





  <button type="submit" class="btn btn-success lg">Update  Division</button>
</form>
 </div>
</div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
