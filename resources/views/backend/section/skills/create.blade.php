@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('dashboard.skills.index') }}">
                    <button class="btn btn-info">Show Skills</button>
                </a>
            </div>
        </div>
        <!-- Skill form -->
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('dashboard.skills.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Create Skill</h4><hr>

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
                            <label for="name" class="col-sm-3 text-end control-label col-form-label">Skill Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter skill name here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="proficiency" class="col-sm-3 text-end control-label col-form-label">Proficiency (%)<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" id="proficiency" name="proficiency" class="form-control" placeholder="Enter proficiency percentage" min="0" max="100" required>
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
