@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card text-dark">
                <div class="card-header">
                    <h1 class="update-user-confirm">
                        Update User Confirm Screen
                    </h1>
                    <img src="{{asset('storage/profile-images/'.request()->session()->get('user')['profile'])}}" alt="profile-img" style="width: 100px; height: 100px;" />
                </div>
                <div class="card-body">
                    <form action="{{url('users/update/updateconfirm/'.request()->session()->get('user')['id'])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <label for="name"> : {{ request()->session()->get('user')['name'] }}</label>
                            <input type="hidden" required class="
                                    form-control
                                    @error('name')
                                    is-invalid
                                    @enderror
                                " placeholder="Enter your name" name="name" id="name" value="{{ request()->session()->get('user')['name'] }}" />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <label> : {{ request()->session()->get('user')['email'] }} </label>
                            <input type="hidden" required name="email" class="
                                    form-control
                                    @error('email')
                                    is-invalid
                                    @enderror
                                " id="exampleFormControlInput1" placeholder="name@example.com" value="{{ request()->session()->get('user')['email'] }}" />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <label> : @if(request()->session()->get('user')['type'] == 0)
                                Admin
                                @else
                                User
                                @endif
                            </label>
                            <input class="
                                    form-control
                                    @error('type')
                                    is-invalid
                                    @enderror
                                " style="display: none" id="type" name="type" value="{{request()->session()->get('user')['type']}}">
                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <label> : {{ request()->session()->get('user')['phone'] }} </label>
                            <input type="hidden" required class="
                                    form-control
                                    @error('phone')
                                    is-invalid
                                    @enderror
                                " placeholder="Enter your phone number" name="phone" id="phone" value="{{ request()->session()->get('user')['phone'] }}" />
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <label> : {{ request()->session()->get('user')['dob'] }} </label>
                            <input type="hidden" required class="
                                    form-control
                                    @error('dob')
                                    is-invalid
                                    @enderror
                                " placeholder="Enter date of birth" name="dob" id="dob" value="{{ request()->session()->get('user')['dob'] }}" />
                            @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <label> : {{ request()->session()->get('user')['address'] }} </label>
                            <input type="hidden" required class="
                                    form-control
                                    @error('address')
                                    is-invalid
                                    @enderror
                                " placeholder="Enter your address" name="address" id="address" value="{{ request()->session()->get('user')['address'] }}" />
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" required class="
                                    form-control
                                    @error('profile')
                                    is-invalid
                                    @enderror
                                " placeholder="Choose your profile picture" name="profile" id="profile" value="{{ request()->session()->get('user')['profile'] }}" />
                            @error('profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-3">
                            Update
                        </button>
                        <a href="{{ url()->previous()}}" class="btn btn-outline-success">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection