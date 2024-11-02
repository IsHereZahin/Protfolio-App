@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Edit Top Description</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <form action="{{ route('dashboard.skills.description.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="top_description">Top Description</label>
                    <textarea id="top_description" name="top_description" class="form-control" rows="4" required>{{ old('top_description', $topDescription) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Description</button>
            </form>
        </div>
    </div>
</div>

@endsection
