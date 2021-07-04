@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="title">User Create Form</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="
                                    form-control
                                    @error('name')
                                    is-invalid
                                    @enderror
                                " placeholder="Enter your name" name="name" id="name" value="{{  
                                isset( request()->session()->get('user')['name']) ?  request()->session()->get('user')['name'] : old('name')
                             }}" />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" name="email" class="
                                    form-control
                                    @error('email')
                                    is-invalid
                                    @enderror
                                " id="exampleFormControlInput1" placeholder="Enter your email address" value="{{
                                isset( request()->session()->get('user')['email']) ?  request()->session()->get('user')['email'] : old('email')
                             }}" />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{
                                isset( request()->session()->get('user')['password']) ? request()->session()->get('user')['password'] : old('password')
                             }}" />
                        </div>
                        <div class="text-danger">{{$errors->first('password')}}</div>

                        <div class="form-group">
                            <label for="pasword">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="
                                    form-control
                                    @error('password_confirmation')
                                    is-invalid
                                    @enderror
                                " placeholder="Password" value="{{
                                isset( request()->session()->get('user')['password_confirmation']) ?  request()->session()->get('user')['password_confirmation'] : old('password_confirmation')
                             }}" />
                        </div>
                        <div class="text-danger">{{$errors->first('password_confirmation')}}</div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="
                                    form-control
                                    @error('type')
                                    is-invalid
                                    @enderror
                                " name="type" value="{{
                                    isset( request()->session()->get('user')['type']) ?  request()->session()->get('user')['type'] : '1'
                                 }}">
                                <option value="0">Admin</option>
                                <option value="1">User</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" placeholder="Enter your phone number" name="phone" id="phone" value="{{
                                isset( request()->session()->get('user')['phone']) ?  request()->session()->get('user')['phone'] : old('phone')
                             }}" />
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" class="
                                    form-control
                                    @error('dob')
                                    is-invalid
                                    @enderror
                                " placeholder="Enter date of birth" name="dob" id="dob" value="{{
                                isset( request()->session()->get('user')['dob']) ?  request()->session()->get('user')['dob'] : old('dob')
                             }}" />
                            @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="
                                    form-control
                                    @error('address')
                                    is-invalid
                                    @enderror" placeholder="Enter your address" name="address" id="address" value="{{
                                isset( request()->session()->get('user')['address']) ?  request()->session()->get('user')['address'] : old('address')
                             }}" />
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="update_photo" class="btn btn-outline-dark update_photo">Profile</label>
                            <input type="file" name="profile" id="update_photo" accept="image/png, image/jpg, image/jpeg" onchange="displaySelectedPhoto('update_photo','image')" style="width: 0; height: 0; overflow: hidden" class="
                                @error('profile')
                                is-invalid
                                @enderror
                            " />
                            <img src="{{ asset('images/default.png') }}" alt="" id="image" class="imagePreview img-thumbnail" style="width: 100px; height: 100px" />
                            @error('profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-3">
                            Confirm
                        </button>
                        <button type="reset" class="btn btn-outline-success">
                            Clear
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
