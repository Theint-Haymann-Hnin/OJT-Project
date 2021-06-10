@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="user-profile-ttl"> User Profile</span>
                    <button class="btn btn-dark profile-edit-btn">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Name</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Date Of Birth</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
