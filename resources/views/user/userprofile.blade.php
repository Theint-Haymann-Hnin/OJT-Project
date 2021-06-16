<!-- @extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="user-profile-ttl"> User Profile</span>
                    <button class="btn btn-dark profile-edit-btn">
                        <i class="fa fa-edit"></i> Edit
                    </button>
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
                            <td>mgmmg@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>User</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>09 938894t9854</td>
                        </tr>
                        <tr>
                            <th>Date Of Birth</th>
                            <td>20001/12/12</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>Yangon</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
