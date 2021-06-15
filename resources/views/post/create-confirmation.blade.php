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
                        <!-- <div class="form-group">
                            <label for="status"><b>Status</b></label>
                            <input
                                type="text" required
                                class="
                                    form-control
                                    @error('status')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter status"
                                name="status"
                                id="status"
                                value="{{ old('status') }}"
                            />
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <div class="form-group">
                            <label for="created_user_id"
                                ><b>Created User Id</b></label
                            >
                            <label for="created_user_id"
                                >:
                                {{ request()->session()->get('post')['created_user_id'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('created_user_id')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter created_user_id"
                                name="created_user_id"
                                id="created_user_id"
                                value="{{ request()->session()->get('post')['created_user_id'] }}"
                            />
                            @error('created_user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="updated_user_id"
                                ><b>Updated User Id</b></label
                            >
                            <label for="updated_user_id"
                                >:
                                {{ request()->session()->get('post')['updated_user_id'] }}</label
                            >
                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('updated_user_id')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter updated_user_id"
                                name="updated_user_id"
                                id="updated_user_id"
                                value="{{ request()->session()->get('post')['updated_user_id'] }}"
                            />
                            @error('updated_user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deleted_user_id"
                                ><b>Deleted User Id</b></label
                            >
                            <label for="deleted_user_id"
                                ><b
                                    >:
                                    {{ request()->session()->get('post')['deleted_user_id'] }}</b
                                ></label
                            >

                            <input
                                type="hidden"
                                required
                                class="
                                    form-control
                                    @error('deleted_user_id')
                                    is-invalid
                                    @enderror
                                "
                                placeholder="Enter deleted_user_id"
                                name="deleted_user_id"
                                id="deleted_user_id"
                                value="{{ request()->session()->get('post')['deleted_user_id'] }}"
                            />
                            @error('deleted_user_id')
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
