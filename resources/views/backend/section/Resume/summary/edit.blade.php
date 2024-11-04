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
                <form class="form-horizontal" action="{{ route('dashboard.summary.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Add this line for update method -->
                    <div class="card-body">
                        <h4 class="card-title">Edit Summary</h4><hr>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 text-end control-label col-form-label">Title <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" placeholder="Enter title here" value="{{ $summary->title }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 text-end control-label col-form-label">Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea id="mytextarea" name="description" class="form-control" placeholder="Enter description here" required>{{ $summary->description }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Update</button> <!-- Change the button text -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
