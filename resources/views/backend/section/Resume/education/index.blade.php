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

            <h1 class="text-center my-4">Education Records</h1>
        </div>

        <div class="col-md-12 text-center mb-4">
            <a href="{{ route('dashboard.education.create') }}">
                <button class="btn btn-info m-2">Add Education</button>
            </a>
        </div>

        <div class="col-md-12">
            @if($educations->isNotEmpty())
                <div class="card">
                    <div class="card-body">
                        @foreach($educations as $education)
                            <div class="skill-item mb-4">
                                <h5 class="card-title">{{ $education->degree }} at {{ $education->institution }}</h5>
                                <p class="text-muted">From: {{ $education->start_date }} to {{ $education->end_date ?? 'Present' }}</p>
                                <p class="text-muted">{!! $education->description !!}</p>
                                <div class="gap-1">
                                    <a href="{{ route('dashboard.education.edit', $education->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('dashboard.education.destroy', $education->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this education record?');">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="alert alert-info">No education records found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
