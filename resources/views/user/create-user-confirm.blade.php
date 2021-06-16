@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="create-user-confirm">
                        Create User Confirmation
                    </h1>
                </div>
                <div class="card-body">
                    <form
                        action="{{ url('/users/store/collectdata') }}"
                        method="post"
                    >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <label>
                                :
                                {{ request()->session()->get('user')['name'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('name')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter your name"
                                name="name"
                                id="name"
                                value=" {{ request()->session()->get('user')['name'] }}"
                            />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1"
                                >Email address</label
                            >
                            <label>
                                :
                                {{ request()->session()->get('user')['email'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                name="email"
                                class="
                                    form-control
                                    @error('email')
                                    is-invalid
                                    @enderror
                                "
                                id="exampleFormControlInput1"
                                placeholder="name@example.com"
                                value="{{ request()->session()->get('user')['email'] }}"
                            />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pasword">Password</label>
                            <label
                                >:
                                {{ request()->session()->get('user')['password'] }}</label
                            >
                            <input
                                type="hidden"
                                name="password"
                                class="form-control"
                                id="pasword"
                                placeholder="Password"
                                value=" {{ request()->session()->get('user')['password'] }}"
                            />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <label
                                >:
                                {{ request()->session()->get('user')['phone'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('phone')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter your phone number"
                                name="phone"
                                id="phone"
                                value=" {{ request()->session()->get('user')['phone'] }}"
                            />
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <label
                                >:
                                {{ request()->session()->get('user')['dob'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('dob')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter date of birth"
                                name="dob"
                                id="dob"
                                value="{{ request()->session()->get('user')['dob'] }}"
                            />
                            @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <label>
                                :
                                {{ request()->session()->get('user')['address'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('address')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter your address"
                                name="address"
                                id="address"
                                value="{{ request()->session()->get('user')['address'] }}"
                            />
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <label>
                                :{{ request()->session()->get('user')['profile'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('profile')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Choose your profile picture"
                                name="profile"
                                id="profile"
                                value="{{ request()->session()->get('user')['profile'] }}"
                            />
                            @error('profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-3">
                            Create
                        </button>
                        <a href="{{ url('users/create') }}">
                            <button
                                type="button"
                                class="btn btn-outline-success"
                            >
                                Cancel
                            </button></a
                        >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
