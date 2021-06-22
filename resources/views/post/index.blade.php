@extends('layouts.app') @section('content')
<div class="container">
    <h2>Post List</h2>
    <div class="row">
        <div class="col-md-6">
            @if (Session('successAlert'))
            <div class="alert alert-success alert-dismissible show fade">
                <strong>{{ Session("successAlert") }}</strong>
                <button class="close" data-dismiss="alert">&times;</button>
            </div>
            @endif
            <form
                action="{{ url('/search_posts') }}"
                class="form-inline my-2 my-lg-0"
                method="GET"
            >
                @csrf
                <input
                    class="form-control mr-sm-2"
                    name="search_data"
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
        @if(Auth::check())
        <div class="col-md-2">
            <a href="{{ url('posts/create') }}"
                ><button type="button" class="btn btn-info btn-lg btn-block">
                    <i class="fas fa-plus"></i> Add
                </button></a
            >
        </div>
        <div class="col-md-2">
            <a
                href="{{ url('/upload') }}"
                type="button"
                class="btn btn-info btn-lg btn-block"
            >
                <i class="fas fa-upload"></i> Upload
            </a>
        </div>
        @endif
        <div class="col-md-2">
            <a href="{{ route('exportExcel', 'csv') }}">
                <button type="button" class="btn btn-info btn-lg btn-block">
                    <i class="fas fa-download"></i> Download
                </button>
            </a>
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
                    <th>Status</th>
                    @if(Auth::check())
                    <th></th>
                    @endif
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
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
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->status}}</td>
                        @if(Auth::check())
                        <td>
                            <form
                                action="{{url('posts/'.$post->id)}}"
                                method="post"
                            >
                                @csrf @method('delete')
                                <a href="{{url('posts/'.$post->id.'/edit')}}">
                                    <button
                                        type="button"
                                        class="btn btn-success mb-2"
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
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $posts->links() }}
            </div>
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
