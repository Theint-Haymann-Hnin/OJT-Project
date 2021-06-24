@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('users/'.$user->id.'/edit')}}"><button class="btn btn-dark profile-edit-btn float-right mt-3">
                        <i class="fa fa-edit"></i> Edit
                    </button></a>
                    <img src="{{asset('storage/profile-images/'.$user->profile)}}" alt="profile-img" style = "width: 100px;">
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Name</th>
                            <td>
                                <span>{{$user->name}}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{$user->type}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <th>Date Of Birth</th>
                            <td>{{$user->dob}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$user->address}}</td>
                        </tr>
                        <tr>
                            <th>Profile</th>
                            <td>{{$user->profile}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
