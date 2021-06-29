@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card text-dark">
                <div class="card-header">
                    <h1 class="title">Post Create Form</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input
                                type="text"
                                class="
                                    form-control
                                    @error('title')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter your title"
                                name="title"
                                id="title"
                                value="{{isset( request()->session()->get('post')['title']) ?  request()->session()->get('post')['title'] : ''
                            }}"
                            />
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                class="
                                    form-control
                                    @error('description')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter Description"
                                >{{isset( request()->session()->get('post')['description']) ?  request()->session()->get('post')['description'] : ''
                                }}</textarea
                            >
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-success mr-3">Confirm</button>
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
