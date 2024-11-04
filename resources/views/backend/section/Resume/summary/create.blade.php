@extends('backend.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div style="float: right">
                <a href="{{ route('dashboard.summary.index') }}">
                    <button class="btn btn-info m-3">Back</button>
                </a>
            </div>
        </div>
        <!-- Summary form -->
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('dashboard.summary.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Create Summary</h4><hr>

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 text-end control-label col-form-label">Title <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" placeholder="Enter title here" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 text-end control-label col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea id="mytextarea" name="description" class="form-control" placeholder="Enter description here" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
