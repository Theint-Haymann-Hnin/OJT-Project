@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="create-user-confirm">Upload CSV File</h1>
                </div>
                <div class="card-body">
                  <form action="">
                    <div class="form-group">
                        <label for="browse">Browse</label>
                        <input
                            type="file" required
                            class="form-control"
                        />
                    </div>
                    <button type="submit" class="btn btn-success">Import File</button>
                  </form>
                </div>
              </div>

        </div>
    </div>
</div>

@endsection