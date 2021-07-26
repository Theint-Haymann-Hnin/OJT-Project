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
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/search_posts') }}" class="form-inline my-2 my-lg-0" method="GET">
                @csrf
                <input class="form-control mr-sm-2" name="search_data" type="search" placeholder="Search" aria-label="Search" style="width: 400px" value="{{$searchData}}" />
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </form>
        </div>
        @if(Auth::check())
        <div class="col-md-2">
            <a href="{{ url('posts/create') }}" class="btn btn-info btn-lg btn-block"> <i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="col-md-2">
            <a href="{{ url('/upload') }}" type="button" class="btn btn-info btn-lg btn-block">
                <i class="fas fa-upload"></i> Upload
            </a>
        </div>
        @endif
        <div class="col-md-2">
            <a href="{{ route('exportExcel') }}" class="btn btn-info btn-lg btn-block">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <th class="text-center">Post Title</th>
                    <th class="text-center">Post Description</th>
                    <th class="text-center">Posted User</th>
                    <th class="text-center">Posted Date</th>
                    @if(Auth::check())
                    <th>Action</th>
                    @endif
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            <a class="ttl" data-toggle="modal" data-target="#mymodal" onclick="postDetail({{$post->id}})">
                                {{$post->title}}
                            </a>
                        </td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                        @if(Auth::check())
                        <td>
                            <form action="{{url('posts/'.$post->id)}}" method="post">
                                @csrf @method('delete')
                                <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-success">
                                    <i class="fa fa-edit"></i> Edit
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
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
            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle">
                                Post Detail
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header">
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
