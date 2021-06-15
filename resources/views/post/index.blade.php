@extends('layouts.app') @section('content')
<div class="container">
    <h1 class="title">Post List</h1>
    <div class="row">
        <div class="col-md-6">
            @if (Session('successAlert'))
            <div class="alert alert-success alert-dismissible show fade">
                <strong>{{ Session("successAlert") }}</strong>
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif
            <form class="form-inline my-2 my-lg-0">
                <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    style="width: 400px"
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
            <a href="{{ url('posts/create') }}"
                ><button type="button" class="btn btn-info btn-lg btn-block">
                    <i class="fas fa-plus"></i> Add
                </button></a
            >
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-info btn-lg btn-block">
                <i class="fas fa-upload"></i> Upload
            </button>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-info btn-lg btn-block">
                <i class="fas fa-download"></i> Download
            </button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>Post Title</th>
                    <th>Post Description</th>
                    <th>Posted User</th>
                    <th>Posted Date</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        @foreach($posts as $post)
                        <td>
                            <a
                                class="ttl"
                                data-toggle="modal"
                                data-target="#exampleModalCenter"
                            >
                                {{$post->title}}
                            </a>
                        </td>
                        <td>{{$post->description}}</td>
                        <td>{{$post-> created_user_id}}</td>
                        <td>{{$post-> created_at}}</td>
                        <td>
                            <form
                                action="{{url('posts/'.$post->id)}}"
                                method="post"
                            >
                                @csrf @method('delete')
                                <a href="{{url('posts/'.$post->id.'/edit')}}">
                                    <button
                                        type="button"
                                        class="btn btn-success mr-1"
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
                            <h5>Description</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Repellat laudantium,
                                voluptatum fugiat voluptates deserunt iusto
                                distinctio ad quidem quo ullam, maxime placeat
                                alias? Tenetur necessitatibus aliquid harum
                                excepturi pariatur voluptate.
                            </p>
                            <h5>Status</h5>
                            <p>publish</p>
                            <h5>Created at</h5>
                            <p>YYY/MM/DD</p>
                            <h5>Created user</h5>
                            <p>John</p>
                            <h5>Last Updated at</h5>
                            <p>YYY/MM/DD</p>
                            <h5>Updated user</h5>
                            <p>John</p>
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
        <div class="col-md-1"></div>
    </div>
</div>
@endsection
