@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Flash messages -->
        <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            <h1 class="text-center">Skills</h1>
        </div>

        <div class="col-md-12">
            <a href="{{ route('dashboard.skills.create') }}">
                <button class="btn btn-info m-3">Add Skill</button>
            </a>
        </div>

        <!-- Skills Content -->
        <div class="col-md-12">
            @if($skills->isNotEmpty())
                <div class="card">
                    <div class="card-body">
                        @foreach($skills as $skill)
                            <div class="skill-item mb-3">
                                <h5 class="card-title">{{ $skill->name }} <span class="badge bg-primary">{{ $skill->proficiency }}%</span></h5>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $skill->proficiency }}%;" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="gap-1">
                                    <a href="{{ route('dashboard.skills.edit', $skill->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('dashboard.skills.delete', $skill->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this skill?');">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="alert alert-info"> No skills found.</div>
            @endif
        </div>

    </div>
</div>
@endsection
