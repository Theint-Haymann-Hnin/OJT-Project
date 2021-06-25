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
            <form
                action="{{ url('/search_users') }}"
                class="form-inline my-2 my-lg-0"
                method="GET"
            >
                @csrf
                <input
                    class="form-control mr-sm-1"
                    type="search"
                    placeholder="Name"
                    aria-label="Search"
                    name="search_data"
                />
                <input
                    class="form-control mr-sm-1"
                    type="search"
                    placeholder="Email"
                    aria-label="Search" name="search_data"
                />
                <input
                    class="form-control mr-sm-1"
                    type="search"
                    placeholder="Created From"
                    aria-label="Search" name="created_from"
                />
                <input
                    class="form-control mr-sm-1"
                    type="search"
                    placeholder="Created to"
                    aria-label="Search" name="created_to"
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
                        <td>
                            
                            <a
                                class="ttl"
                                data-toggle="modal"
                                data-target="#exampleModalCenter"
                                onclick="userDetail({{$user->id}})"
                            >
                                {{$user->name}}
                            </a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>@if($user->type == 0)         
                            Admin        
                       @else
                            User    
                       @endif</td>
                      {{--   <td>{{$user->created_user_id}}</td> --}}
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
            {{ $users->links() }}
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
                                    <a
                                        href=" {{ route('users.update', [$user->id]) }}"
                                    >
                                        <button
                                            class="
                                                btn btn-dark
                                                profile-edit-btn
                                            "
                                        >
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table
                                        class="table table-bordered table-hover"
                                    >
                                    <tbody id="displayArea">
                                        </tbody>
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
@section('javascript')
    <script>
       function userDetail(id){
           var user_id = id;
       
        $.get("api/user/"+user_id, function( response ) {
            var user_name = response.name;
            var user_email = response.email;
            var user_type = response.type;
            var user_phone = response.phone;
            var user_dob = response.dob;
            var user_address = response.address;
            console.log(response.profile);
           
            $('#displayArea').append("<tr><th>Name</th><td>" + user_name + "</td></tr><tr><th>Email</th><td>"+user_email+"</td></tr>");
        });
       
        }
    </script>
@endsection




