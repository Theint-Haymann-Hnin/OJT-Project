@extends('layouts.app') @section('content')
<div class="container">
    <h1 class="title">User List</h1>
    <div class="row">
        <div class="col-md-10">
            <form class="form-inline my-2 my-lg-0">
                <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Name"
                    aria-label="Search"
                />
                <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Email"
                    aria-label="Search"
                />
                <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Created From"
                    aria-label="Search"
                />
                <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Created to"
                    aria-label="Search"
                />
                <button
                    class="btn btn-outline-success my-2 my-sm-0"
                    type="submit"
                >
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </form>
        </div>
        <div class="col-md-2">
            <a href="{{ url('/users/create') }}"
                ><button type="button" class="btn btn-info btn-lg btn-block">
                    <i class="fas fa-user-plus"></i> Add
                </button></a
            >
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created User</th>
                        <th>Phone</th>
                        <th>Birth Date</th>
                        <th>Address</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <!-- <td><a href data-toggle="modal" data-target="#yourModal{{$user->id}}">{{$user->name}}</a>
                        <td> -->
                            <td>
                            <a
                                class="ttl"
                                data-toggle="modal"
                                data-target="#exampleModalCenter"
                            >
                                {{$user->name}}
                            </a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_user_id}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->dob}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <form
                                action="{{url('users/'.$user->id)}}"
                                method="post"
                            >
                                @csrf @method('delete')
                                <a href="{{url('users/'.$user->id.'/edit')}}">
                                    <button
                                        type="button"
                                        class="btn btn-success mr-1 mb-2"
                                    >
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                </a>
                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete?')"
                                >
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Modal -->
           
            <div
                class="modal fade"
                id="exampleModalCenter"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle">
                               User Detail
                            </h4>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header">
                                    <span class="user-profile-ttl">
                                        User Profile</span
                                    >
                                    <a href=" {{ route('users.update', [$user->id]) }}">
                                        <button
                                        class="btn btn-dark profile-edit-btn"
                                    >
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    </a>
                                </div>
                                @foreach($users as $user)
                                <div class="card-body">
                                    <table
                                        class="table table-bordered table-hover"
                                    >
                                        <tr>
                                            <th>Name</th>
                                            <td>
                                                <span>{{$user->name}}</span> <br>
                                                <span><img src="{{asset('storage/profile-images/'.$user->profile)}}" alt="profile-img" style = "width: 300px; height: 200px;"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email Address</th>
                                            <td>{{$user-> email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td>{{$user-> type}}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{$user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Of Birth</th>
                                            <td>{{$user-> dob}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{$user-> address}}</td>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-info"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
