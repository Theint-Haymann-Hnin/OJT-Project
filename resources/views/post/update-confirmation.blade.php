@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="title">Update Post Confirmation</h1>
                </div>
                <div class="card-body">
                    <form
                        action="{{url('posts/update/updateconfirm/'.request()->session()->get('post')['id'])}}"
                        method="post"
                    >
                        @csrf @method('put')
                        <div class="form-group input-group">
                            <label for="title" class="col-sm-2"
                                ><b>Title</b></label
                            >
                            <label class="col-sm-8">
                                :
                                {{ request()->session()->get('post')['title'] }}</label
                            >
                            <input
                                type="hidden"
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
                        <div class="form-group input-group">
                            <label for="description" class="col-sm-2"
                                ><b>Description</b></label
                            >
                            <label class="col-sm-8"
                                >:
                                {{ request()->session()->get('post')['description'] }}</label
                            >
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
                                >{{ request()->session()->get('post')['description'] }}</textarea
                            >
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="custom-control custom-checkbox mt-3 mb-3">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="defaultUnchecked col-sm-2"
                                name="status"
                                @if(
                                isset(session()-
                            />get('post')['status'])) checked @endif >
                            <label
                                class="custom-control-label"
                                for="defaultUnchecked"
                                >Status</label
                            >
                        </div>
                        <button class="btn btn-success mr-3">Confirm</button>
                        <button class="btn btn-outline-success">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
