@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card text-dark">
                <div class="card-header">
                    <h1 class="title">Update Post</h1>
                </div>
                <div class="card-body">
                    <form action="{{url('posts/'.$post->id)}}" method="post">
                        @csrf @method('put')
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
                                value="{{ old('title') ?? $post->title}}"
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
                                >{{ old("description")  ??$post->description }}</textarea
                            >
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="custom-control custom-checkbox mt-3 mb-3">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="defaultUnchecked"
                                name="status"
                                @if($post->status ) checked @endif >
                            <label
                                class="custom-control-label"
                                for="defaultUnchecked"
                                >Status</label
                            >
                        </div>
                        <a href="{{ url('/updatepostconfirm') }}"
                            ><button class="btn btn-success mr-3">
                                Confirm
                            </button></a
                        >
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
