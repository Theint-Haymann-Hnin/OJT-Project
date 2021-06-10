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
                        <td>user1</td>
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
        </div>
    </div>
</div>
@endsection
