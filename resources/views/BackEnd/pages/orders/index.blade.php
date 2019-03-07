@extends('BackEnd.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Manage Orders
      </div>
      <div class="card-body">
        @include('BackEnd.partials.messages')
        <table class="table center-aligned-table" id="dataTable">
            <thead>


          <tr>
            <th class="border-bottom-0">#No:</th>
            <th class="border-bottom-0">Order ID</th>
            <th class="border-bottom-0">Order Name</th>
            <th class="border-bottom-0" >Orderer Phone No</th>
            <th class="border-bottom-0">Order Status</th>
            <th class="border-bottom-0">Messages</th>
            <th class="border-bottom-0">Action </th>
          </tr>
            </thead>



      <tbody>
            @foreach ($orders as $order)

          <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>#Or-{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->phone_no}}</td>
            <td>

              <p>
            @if($order->is_seen_by_admin)
            <button class="btn btn-info btn-sm" type="button" name="button">Seen </button>
            @else
            <button class="btn btn-warning btn-sm" type="button" name="button">UnSeen</button>
            @endif
            </p>
            <p>
          @if($order->is_completed)
          <button class="btn btn-info btn-sm" type="button" name="button">Completed</button>
          @else
          <button class="btn btn-warning btn-sm" type="button" name="button">Not Completed</button>
          @endif
          </p>
            <p>
          @if($order->is_paid)
          <button class="btn btn-info btn-sm" type="button" name="button">Paid</button>
          @else
          <button class="btn btn-danger btn-sm" type="button" name="button">UnPaid</button>
          @endif
          </p>

            </td>

            <td width="20%">{{str_limit($order->message, $limit = 17, $end = '  .....')}}</td>


            <td>

              <a href="#deleteModal{{$order->id}}" data-toggle="modal" class="btn btn-outline-danger btn-sm">Delete</a>
              <a href="{{route('admin.order.show',$order->id)}}"  class="btn btn-outline-info btn-sm">View Details</a>


            </td>

          </tr>

            <!--Delete Modal -->
            <div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm to Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                      <form class="" action="{{route('admin.order.delete',$order->id)}}" method="post">
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
          @endforeach
          </tbody>
          <tfoot>


        <tr>
          <th class="border-bottom-0">#No:</th>
          <th class="border-bottom-0">Order ID</th>
          <th class="border-bottom-0">Order Name</th>
          <th class="border-bottom-0" >Orderer Phone No</th>
          <th class="border-bottom-0">Order Status</th>
          <th class="border-bottom-0">Messages</th>
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
