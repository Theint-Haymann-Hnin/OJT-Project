@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="title">User Create Form</h1>
                </div>
                <div class="card-body">
                    <form action="{{ url('/users') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
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
                                value="{{ old('name') }}"
                            />
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1"
                                >Email address</label
                            >
                            <input
                                type="email"
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
                                value="{{ old('email') }}"
                            />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pasword">Password</label>
                            <input
                                type="password"
                                required
                                name="password"
                                class="form-control"
                                id="pasword"
                                placeholder="Password"
                            />
                        </div>
                        <div class="form-group">
                            <label for="pasword">Confirm Password</label>
                            <input
                                type="password"
                                required
                                name="password"
                                class="form-control"
                                id="pasword"
                                placeholder="Password"
                            />
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select
                                class="
                                    form-control
                                    @error('actress')
                                    is-invalid
                                    @enderror
                                "
                                id="type"
                                name="type"
                                required
                            >
                                <option>Select Type</option>
                                <option value="0">Admin</option>
                                <option value="1">User</option>
                                <!-- <option value="visitor">Visitor</option> -->
                            </select>
                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input
                                type="text"
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
                                value="{{ old('phone') }}"
                            />
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <!-- <input type="date" id="date" name="date"
                value="date" style="width:1000px;"> -->
                            <input
                                type="date"
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
                                value="{{ old('dob') }}"
                            />
                            @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input
                                type="text"
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
                                value="{{ old('address') }}"
                            />
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <input
                                type="file"
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
                                value="{{ old('profile') }}"
                            />
                            @error('profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="created_user_id"
                                ><b>Created User Id</b></label
                            >
                            <input
                                type="text"
                                required
                                class="
                                    form-control
                                    @error('created_user_id')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter created_user_id"
                                name="created_user_id"
                                id="created_user_id"
                                value="{{ old('created_user_id') }}"
                            />
                            @error('created_user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="updated_user_id"
                                ><b>Updated User Id</b></label
                            >
                            <input
                                type="text"
                                required
                                class="
                                    form-control
                                    @error('updated_user_id')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter updated_user_id"
                                name="updated_user_id"
                                id="updated_user_id"
                                value="{{ old('updated_user_id') }}"
                            />
                            @error('updated_user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deleted_user_id"
                                ><b>Deleted User Id</b></label
                            >
                            <input
                                type="text"
                                required
                                class="
                                    form-control
                                    @error('deleted_user_id')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter deleted_user_id"
                                name="deleted_user_id"
                                id="deleted_user_id"
                                value="{{ old('deleted_user_id') }}"
                            />
                            @error('deleted_user_id')
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
