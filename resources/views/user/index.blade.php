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
            <button type="button" class="btn btn-info btn-lg btn-block">
                <i class="fas fa-user-plus"></i> Add
            </button>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a
                                class="ttl"
                                data-toggle="modal"
                                data-target="#exampleModalCenter"
                            >
                                User1
                            </a>
                        </td>
                        <td>user1@gmail.com</td>
                        <td>user1</td>
                        <td>09 38948988</td>
                        <td>YYY/mm/dd</td>
                        <td>Yangon</td>
                        <td>YYY/mm/dd</td>
                        <td>YYY/mm/dd</td>
                        <td>
                            <button type="submit" class="btn btn-success mr-1">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <button type="button" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">
                                Post title
                            </h5>
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
                                    <button
                                        class="btn btn-dark profile-edit-btn"
                                    >
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table
                                        class="table table-bordered table-hover"
                                    >
                                        <tr>
                                            <th>Name</th>
                                            <td>
                                                <span>Mg Mg</span>
                                                <span>Mg Mg' img</span>
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
