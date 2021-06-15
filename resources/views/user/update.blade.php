@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="title">Update User Screen</h1>
                </div>
                <div class="card-body">
                    <form
                        action="{{ route('users.update', [$user->id]) }}"
                        method="post"
                    >
                        @csrf @method('put')
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
                                value="{{ old('name') ?? $user->name}}"
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
                                value="{{ old('email') ?? $user->email }}"
                            />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select
                                class="form-control"
                                id="type"
                                name="type"
                                required
                            >
                                <option>Select Type</option>
                                <option value="{{$user->type}}">
                                    {{$user->type}}
                                </option>

                                <!-- <option>Admin</option>
                                <option>User</option>
                                <option>Visitor</option> -->
                            </select>
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
                                value="{{ old('phone') ?? $user->phone}}"
                            />
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
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
                                value="{{ old('dob') ?? $user->dob }}"
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
                                value="{{ old('address') ?? $user->address}}"
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
                        <a href="{{ url('/changepassword') }}" class="changepwd"
                            >Change Password</a
                        >
                        <button class="btn btn-primary mr-3">Confirm</button>
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
