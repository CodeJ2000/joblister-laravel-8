@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-primary text-white border">
      Update Profile
    </div>
    <div class="account-bdy p-3">
      <form action="{{route('account.update-profile', auth()->user()->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="m-b-25"> <img src="{{asset(auth()->user()->image ? auth()->user()->image  : 'images/user-profile.png')}}" width="150px" height="130px" class="img-radius" alt="User-Profile-Image"> </div>
        </div>
        <div class="mb-3">
            <input class="form-control" name="image" type="file" id="formFile">
          </div>
        <div class="line-divider"></div>
        <div class="mt-3">
          <button type="submit" class="btn primary-btn">Update password</button>
          <button class="btn primary-outline-btn">Cancel</button>
        </div>
      </form>
    </div>
  </div>
@endSection

@push('css')

@endpush