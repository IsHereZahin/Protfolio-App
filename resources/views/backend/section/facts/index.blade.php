@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- flash message -->
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

            <h1 class="text-center">Facts Data</h1>
        </div>
        <div class="col-md-12">
            @if($data)
                <a href="{{ route('dashboard.facts.edit') }}">
                    <button class="btn btn-warning m-3">Edit</button>
                </a>

                <!-- Delete Button -->
                <form action="{{ route('dashboard.facts.delete') }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-3" onclick="return confirm('Are you sure you want to delete this fact data?')">Delete</button>
                </form>
            @else
                <a href="{{ route('dashboard.facts.create') }}">
                    <button class="btn btn-info m-3">Create</button>
                </a>
            @endif
        </div>

        <!-- content -->
        <div class="col-md-12">
            @if($data)
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Clients            : {{ $data->clients }}</p>
                        <p class="card-text">Projects           : {{ $data->projects }}</p>
                        <p class="card-text">Hours of Support   : {{ $data->hours_of_support }}</p>
                        <p class="card-text">Awards             : {{ $data->awards }}</p>
                        <p class="card-text">Top Description    : {{ $data->top_description }}</p>
                    </div>
                </div>
            @else
                <div class="alert alert-info"> No data found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
