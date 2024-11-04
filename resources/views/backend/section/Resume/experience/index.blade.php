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

            <h1 class="text-center my-4">Experience Records</h1>
        </div>

        <div class="col-md-12 text-center mb-4">
            <a href="{{ route('dashboard.experience.create') }}">
                <button class="btn btn-info m-2">Add Experience</button>
            </a>
        </div>

        <div class="col-md-12">
            @if($experiences->isNotEmpty())
                <div class="card">
                    <div class="card-body">
                        @foreach($experiences as $experience)
                            <div class="experience-item mb-4">
                                <h5 class="card-title">{{ $experience->position }} at {{ $experience->company }}</h5>
                                <p class="text-muted">From: {{ $experience->start_date }} to {{ $experience->end_date ?? 'Present' }}</p>
                                <p class="text-muted">{!! $experience->description !!}</p>
                                <div class="gap-1">
                                    <a href="{{ route('dashboard.experience.edit', $experience->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('dashboard.experience.destroy', $experience->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this experience record?');">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="alert alert-info">No experience records found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
