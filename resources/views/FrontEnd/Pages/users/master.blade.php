@extends('FrontEnd.layouts.master')
@section('content')
<!-- <div class="container margin-top-20">
  <h2>Wlecome {{$user->first_name.''.$user->last_name}}</h2>


  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div> -->
<div class="container mt-2">
  <div class="row">
    <div class="col-md-4">
      <div class="list-group">
        <a href="#">
           <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle"style="width:200px" >
           Welcome {{ Auth::user()->first_name.''.Auth::user()->last_name }} <span class="caret"></span>
         </a>
        <a class="list-group-item {{ Route::is('user.dashboard') ? 'active' :'' }} primary" href="{{ route('user.dashboard') }}">Dashboard</a>
        <a class="list-group-item {{ Route::is('user.profile') ? 'active' :'' }}" href="{{ route('user.dashboard') }}">Update Profile</a>
        <a class="list-group-item {{ Route::is('user.dashboard') ? 'active' :'' }}" href="{{ route('user.dashboard') }}">Dashboard</a>
        <a class="list-group-item {{ Route::is('user.dashboard') ? 'active' :'' }}" href="{{ route('user.dashboard') }}">Dashboard</a>

      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-body">
        @yield('sub-content')
      </div>

    </div>

  </div>

</div>
@endsection
