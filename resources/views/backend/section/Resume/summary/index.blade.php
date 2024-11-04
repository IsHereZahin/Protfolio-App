@extends('backend.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Flash message -->
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

            <h1 class="text-center">Summary Data</h1>
        </div>

        <div class="col-md-12">
            @if($data)
                <div class="mb-3">
                    <a href="{{ route('dashboard.summary.edit') }}">
                        <button class="btn btn-warning">Edit</button>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('dashboard.summary.destroy') }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this summary data?')">Delete</button>
                    </form>
                </div>
            @else
                <a href="{{ route('dashboard.summary.create') }}">
                    <button class="btn btn-info">Create</button>
                </a>
            @endif
        </div>

        <!-- Content -->
        <div class="col-md-12">
            @if($data)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Summary Details</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $data->title }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{!! $data->description !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="alert alert-info">No data found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
