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
        <table class="table center-aligned-table" id="dataTable">
        <thead>
          <tr>
            <th class="border-bottom-0"></th>
            <th class="border-bottom-0">Product Title</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Quantity</th>
            <th class="border-bottom-0">Action </th>
          </tr>
                  </thead>
                  <tbody>

            @foreach ($products as $products)
          <tr>
          <td>{{ $loop->index+1 }}</td>
            <td>{{$products->title}}</td>
            <td>{{$products->price}}</td>
            <td>{{$products->quantity}}</td>
            <td>
              <a class="btn btn-outline-success btn-sm"href="{{ route('admin.product.edit',$products->id)}}">Edit</a>
              <a href="#deleteModal{{$products->id}}" data-toggle="modal" class="btn btn-outline-danger btn-sm">Delete</a>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form class="" action="{{route('admin.product.delete',$products->id)}}" method="post">
         {{csrf_field()}}
         <button type="submit" class="btn btn-danger" name="button">Delete</button>
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
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th class="border-bottom-0"></th>
            <th class="border-bottom-0">Product Title</th>
            <th class="border-bottom-0">Price</th>
            <th class="border-bottom-0">Quantity</th>
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
