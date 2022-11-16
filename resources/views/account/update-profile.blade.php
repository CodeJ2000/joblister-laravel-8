@extends('layouts.account')

@section('content')
<div class="account-layout border">
  <div class="account-hdr bg-primary text-white border">
    Edit Profile
  </div>
  <div class="account-bdy p-3">
   <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @if($errors->any())
     <div class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</div> 
  @endif

      @csrf
      @method('patch')
      

      <div class="pb-3">
        <div class="py-3">
          <p>Profile image</p>
          <img src="" width="80px" alt="">
        </div>
        <div class="custom-file">
          <input type="file" value="{{ old('image') ?? $user->profile->image }}" class="custom-file-input"  name="image">
          <label class="custom-file-label" >Choose profile picture  in your gallery...</label>
          @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col">
            <div class="py-3">
              <p>Birthdate</p>
            </div>
            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('date') ??$user->profile->birthdate }}" required >
              @error('birthdate')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="col">
            <div class="py-3">
              <p>
                Gender
              </p>
            </div>
            <select name="gender" id="">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
        </div>
      </div>
      @role('user')
      <div class="form-group">
        <div class="py-3">
          <p>Attach your resume</p>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input"  name="resume_file">
          <label class="custom-file-label" >Attach your resume here....</label>
          @error('resume_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      @endrole
      <div class="form-group">
        <div class="py-3">
          <p>Educational Background</p>
        </div>
        <select name="educ" class="form-control" value="{{ old('educ') ??$user->profile->educ }}">
          <option value="Bachelors">Bachelors</option>
          <option value="High School">High School</option>
          <option value="Master">Master</option>
          <option value="SEE Mid School">SEE Mid School</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <div class="pt-3">
          <p>Contact Number</p>
        </div>
        <input type="text" placeholder="Contact number" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') ?? $user->profile->contact_number }}" required>
          @error('website')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group">
        <div class="pt-3">
          <p>Home address</p>
        </div>
        <input type="text" placeholder="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ??$user->profile->address }}" required>
          @error('address')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="line-divider"></div>
      <div class="mt-3">
        <button type="submit" class="btn primary-btn">Update profile</button>
        <a href="" class="btn primary-outline-btn">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endSection

@push('css')

@endpush