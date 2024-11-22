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
            <h1 class="text-center my-4">Portfolios</h1>
        </div>

        <div class="col-md-12 text-center mb-4">
            <a href="{{ route('dashboard.portfolio.create') }}">
                <button class="btn btn-info m-2">Add Portfolio</button>
            </a>
        </div>

        <!-- Portfolio Content -->
        <div class="col-md-12">
            @if($portfolios->isNotEmpty())
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Project Date</th>
                                    <th scope="col">Main Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $portfolio->id }}</td>
                                        <td>{{ $portfolio->title }}</td>
                                        <td>{{ $portfolio->category }}</td>
                                        <td>
                                            {{ $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('d M Y') : 'N/A' }}
                                        </td>
                                        <td>
                                            @if($portfolio->main_thumbnail)
                                                <img src="{{ asset('storage/' . $portfolio->main_thumbnail) }}" alt="Main Thumbnail" class="img-thumbnail" style="max-width: 100px;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.portfolio.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('dashboard.portfolio.delete', $portfolio->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this portfolio?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="alert alert-info">No portfolios found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
