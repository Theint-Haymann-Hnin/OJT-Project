@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="title">Create Post Confirmation</h1>
                </div>
                <div class="card-body">
                    <form
                        action="{{ url('/posts/store/collectdata') }}"
                        method="post"
                    >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title"><b>Title</b></label>
                            <label for="title"
                                >:
                                {{ request()->session()->get('post')['title'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('title')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter your title"
                                name="title"
                                id="title"
                                value="{{ request()->session()->get('post')['title'] }}"
                            />
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description"><b>Description</b></label>
                            <label for="description"
                                >:
                                {{ request()->session()->get('post')['description'] }}
                            </label>
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
                                style="display: none"
                                placeholder="Enter Description"
                            >
 {{ request()->session()->get('post')['description'] }}</textarea
                            >
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                      
                        <button class="btn btn-success mr-3">Create</button>
                        <a href="{{ url('posts/create') }}">
                            <button
                                type="button"
                                class="btn btn-outline-success"
                            >
                                Cancel
                            </button></a
                        >
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection
