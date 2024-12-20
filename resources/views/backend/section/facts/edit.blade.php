@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div style="float: right">
                <a href="{{ route('dashboard.facts.index') }}">
                    <button class="btn btn-info m-3">Back to Facts</button>
                </a>
            </div>
        </div>
        <!-- Edit Form -->
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('dashboard.facts.update', $fact->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Specify the HTTP method for updates -->
                    <div class="card-body">
                        <h4 class="card-title">Edit Fact</h4><hr>
                        <div class="form-group row">
                            <label for="top_description" class="col-sm-3 text-end control-label col-form-label">Top Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="top_description" class="form-control" placeholder="Enter top description here" required>{{ old('top_description', $fact->top_description) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clients" class="col-sm-3 text-end control-label col-form-label">Clients <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="clients" class="form-control" placeholder="Enter clients here" value="{{ old('clients', $fact->clients) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="projects" class="col-sm-3 text-end control-label col-form-label">Projects <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="projects" class="form-control" placeholder="Enter projects here" value="{{ old('projects', $fact->projects) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hours_of_support" class="col-sm-3 text-end control-label col-form-label">Hours of Support <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="hours_of_support" class="form-control" placeholder="Enter hours of support here" value="{{ old('hours_of_support', $fact->hours_of_support) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="awards" class="col-sm-3 text-end control-label col-form-label">Awards <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="awards" class="form-control" placeholder="Enter awards here" value="{{ old('awards', $fact->awards) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
