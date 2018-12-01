@extends('FrontEnd.pages.users.master')
@section('sub-content')
<div class="container">
  <div class="card-body mb-5">
      <form method="POST" action="{{ route('user.profile.update') }}">
          @csrf

          <div class="form-group row">
              <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

              <div class="col-md-6">
                  <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>


              </div>
          </div>
          <div class="form-group row">
              <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

              <div class="col-md-6">
                  <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>


              </div>
          </div>
          <div class="form-group row">
              <label for="username" class="col-md-4 col-form-label text-md-right">UserName</label>

              <div class="col-md-6">
                  <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required autofocus>

              </div>
          </div>
          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>


              </div>
          </div>
          <div class="form-group row">
              <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

              <div class="col-md-6">
                  <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ $user->phone_no }}" required autofocus>


              </div>
          </div>
          <div class="form-group row">
              <label for="street_Address" class="col-md-4 col-form-label text-md-right">{{ __('Street Address') }}</label>

              <div class="col-md-6">
                  <textarea id="street_Address" type="text" class="form-control" name="street_address"  required autofocus>
                    {{ $user->street_Address}}
                  </textarea>

              </div>
          </div>
          <div class="form-group row">
              <label for="street_Address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

              <div class="col-md-6">
                  <textarea rows="4" id="street_Address" type="text" class="form-control" name="shipping_address"  required autofocus>
                    {{ $user->shipping_address}}
                  </textarea>

              </div>
          </div>

          <div class="form-group row">
              <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

              <div class="col-md-6">
                <select class="form-control" name="division_id" id="division_id" class="form-control">
                  <option value="">Select Your Division</option>
                  @foreach($divisions as $division)
                  <option value="{{$division->id}}" {!! $division->id==$user->division_id ? 'selected' : ' ' !!}> {{ $division->name}}</option>
                  @endforeach
                </select>

              </div>
          </div>
          <div class="form-group row">
              <label for="District" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

              <div class="col-md-6">
                <select class="form-control" name="district_id" id="district_id" class="form-control">
                  <option value="">Select Your District</option>
                  @foreach($districts as $district)
                  <option value="{{$district->id}}" {!! $district->id == $user->district_id ? 'selected' : ' ' !!}> {{ $district->name}}</option>
                  @endforeach
                </select>

              </div>
          </div>




          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">New Password (Optional) }}</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" >



              </div>
          </div>





          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Update Profile
                  </button>
              </div>
          </div>
      </form>

  </div>


</div>
@endsection
