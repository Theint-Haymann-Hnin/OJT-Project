@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="change-pwd-ttl">Change Password</h1>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputPassword1"
                                >Old Password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="exampleInputPassword1"
                                placeholder="Password"
                            />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"
                                >New Password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="exampleInputPassword1"
                                placeholder="Password"
                            />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"
                                >Confirm New Password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="exampleInputPassword1"
                                placeholder="Password"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary mr-3">
                            Change
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
