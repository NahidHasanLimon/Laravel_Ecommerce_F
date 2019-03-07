@extends('BackEnd.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Manage Brand
      </div>
      <div class="card-body">

        <table class="table center-aligned-table" id="dataTable">
        <thead>

          <tr>
            <th class="border-bottom-0">#No:</th>
            <th class="border-bottom-0">Brand Name</th>
            <th class="border-bottom-0" >Description</th>
            <th class="border-bottom-0">Image</th>
            <th class="border-bottom-0">Action </th>
          </tr>

        </thead>
        <tbody>
            @foreach ($brands as $brand)
          <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{$brand->name}}</td>
            <td width="20%">{{str_limit($brand->description, $limit = 17, $end = '  .....')}}</td>
            <td >
              <img src="{!! asset('images/brands/'.$brand->image) !!}" alt="No Image" height="50px" width="100">
            </td>

            <td>
              <a class="btn btn-outline-success btn-sm"href="{{ route('admin.brand.edit',$brand->id)}}">Edit</a>
              <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-outline-danger btn-sm">Delete</a>
              <label class="badge badge-teal">  <a href="#detailsModal{{$brand->id}}" data-toggle="modal" class="btn btn-outline-danger btn-sm">View Details</a></label>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form class="" action="{{route('admin.brand.delete',$brand->id)}}" method="post">
        @csrf
         <button type="submit" class="btn btn-danger" name="button">Click For Permanent Delete the Brand</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- End of Delete Modal -->

<!--Details Modal -->
<div class="modal fade" id="detailsModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Brand: {{$brand->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5 class="modal-title" id="exampleModalLabel">Description: {{$brand->description}}</h5>
          <img src="{!! asset('images/brands/'.$brand->image) !!}" alt="{{$brand->name}}">

      </div>
      <div class="modal-footer">
        <a class="btn btn-outline-success btn-sm"href="{{ route('admin.brand.edit',$brand->id)}}">Edit</a>

        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- End of Details Modal -->
            </td>
          </tr>

          @endforeach
        </tbody>
        <tfoot>

          <tr>
            <th class="border-bottom-0">#No:</th>
            <th class="border-bottom-0">Brand Name</th>
            <th class="border-bottom-0" >Description</th>
            <th class="border-bottom-0">Image</th>
            <th class="border-bottom-0">Action </th>
          </tr>

        </tfoot>
        </table>

      </div>

    </div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
