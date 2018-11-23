@extends('BackEnd.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Manage Product
      </div>
      <div class="card-body">
        @include('BackEnd.partials.messages')
        <table class="table center-aligned-table">
          @php $i=1; @endphp
          <tr>
            <th class="border-bottom-0">#No:</th>
            <th class="border-bottom-0">Category Name</th>
            <th class="border-bottom-0" >Description</th>
            <th class="border-bottom-0">Image</th>
              <th class="border-bottom-0">Parent Cat </th>
            <th class="border-bottom-0">Action </th>
          </tr>
            @foreach ($categories as $category)
          <tr>
            <td>{{ $i }}</td>
            <td>{{$category->name}}</td>
            <td width="20%">{{str_limit($category->description, $limit = 17, $end = '  .....')}}</td>
            <td >
              <img src="{!! asset('images/categories/'.$category->image) !!}" alt="No Image" height="50px" width="100">
            </td>
            <td>
              @if ($category->parent_id==0)
                Primary Category

                @else
                {{$category->parent['name']}}

              @endif
            </td>
            <td>
                <a class="btn btn-outline-success btn-sm"href="{{ route('admin.category.edit',$category->id)}}">Edit</a>
              <a href="#deleteModal{{$category->id}}" data-toggle="modal" class="btn btn-outline-danger btn-sm">Delete</a>
              <label class="badge badge-teal">  <a href="" data-toggle="modal" class="btn btn-outline-danger btn-sm">View Details</a></label>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form class="" action="{{route('admin.category.delete',$category->id)}}" method="post">
        @csrf
         <button type="submit" class="btn btn-danger" name="button">Click For Permanent Delete</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- End of Delete Modal -->
            </td>
          </tr>
              @php $i++; @endphp
          @endforeach
        </table>

      </div>

    </div>
  </div>
</div>
<!-- main-panel ends -->
@endsection
