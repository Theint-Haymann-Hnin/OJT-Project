@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (Session('successAlert'))
            <div class="alert alert-success alert-dismissible show fade">
                <strong>{{ Session("successAlert") }}</strong>
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-10">
            <h2>User List</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <form action="{{ url('/search_users') }}" class="form-inline my-2 my-lg-0" method="GET">
                @csrf
                <input class="form-control mr-sm-1" type="search" placeholder="Name" aria-label="Search" name="name" value="{{$name}}" />
                <input class="form-control mr-sm-1" type="search" placeholder="Email" aria-label="Search" name="email" value="{{$email}}" />
                <input class="form-control mr-sm-1" type="date" placeholder="Created From" aria-label="Search" name="start_date" value="{{$start_date}}" />
                <input class="form-control mr-sm-1" type="date" placeholder="Created to" aria-label="Search" name="end_date" value="{{$end_date}}" />
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </form>
        </div>
        <div class="col-md-2">
            <a href="{{ url('/users/create') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-user-plus"></i> Add
            </a>
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
                        <td>
                            <a class="ttl" data-toggle="modal" data-target="#mymodal" onclick="userDetail({{$user->id}})">
                                {{$user->name}}
                            </a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td> {{$user->createdUser->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->dob}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
                        <td>{{date('d-m-Y', strtotime($user->updated_at))}}</td>
                        <td>
                            <form action="{{url('users/'.$user->id)}}" method="post">
                                @csrf @method('delete')
                                <a href="{{url('users/'.$user->id.'/edit')}}" type="button" class="btn btn-success mr-1 mb-2"><i class="fa fa-edit"></i> Edit
                                </a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle">
                                User Detail
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header">
                                    <img src="" alt="" class="user_profile" style="width:100px; height:100px;">
                                    <a href="" class="user-id" id="user_profile_id">
                                        <button class="edit-btn btn btn-dark
                                                profile-edit-btn
                                            ">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover">
                                        <tbody id="displayArea">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">
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
