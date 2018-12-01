@extends('FrontEnd.pages.users.master')
@section('sub-content')
<div class="container margin-top-20">
  <h2>Wlecome {{$user->first_name.''.$user->last_name}}</h2>


<div class="row">
  <div class="col-md-4">
    <div class="card card-body mt2 pointer" onclick="location.href='{{ route('user.profile')  }}' ">
    <h2>Update Profile</h2>
    </div>
  </div>

</div>
</div>
@endsection
