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
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <label>: value</label>
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
                                value="{{ old('title') }}"
                            />
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <label>: value</label>
                            <textarea
                                name="description"
                                id="description"
                                rows="5"
                                class="
                                    form-control
                                    @error('description')
                                    is-invalid
                                    @enderror
                                " style="display: none;"
                                placeholder="Enter Description"
                                >{{ old("description") }}</textarea
                            >
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Default unchecked -->

                        <div class="custom-control custom-checkbox mt-3 mb-3">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="defaultUnchecked"
                            />
                            <label
                                class="custom-control-label"
                                for="defaultUnchecked"
                                >Status</label
                            >
                        </div>
                        <button class="btn btn-success mr-3">Confirm</button>
                        <button class="btn btn-outline-success">Clear</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
