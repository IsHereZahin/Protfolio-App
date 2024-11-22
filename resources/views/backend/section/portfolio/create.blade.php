@extends('backend.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center my-4">Create Portfolio</h1>

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Start -->
            <form action="{{ route('dashboard.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Portfolio Details -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Portfolio Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="project_date">Project Date</label>
                            <input type="date" name="project_date" id="project_date" class="form-control" value="{{ old('project_date') }}">
                        </div>

                        <div class="form-group">
                            <label for="project_url">Project URL</label>
                            <input type="url" name="project_url" id="project_url" class="form-control" value="{{ old('project_url') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="main_thumbnail">Main Thumbnail</label>
                            <input type="file" name="main_thumbnail" id="main_thumbnail" class="form-control" required>
                            <div id="main_thumbnail_preview" class="image-preview" style="display: none;">
                                <img src="#" alt="Thumbnail Preview" class="img-thumbnail">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="images">Portfolio Images</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                            <div id="images_preview" class="multi-image-preview" style="margin-top: 10px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Client Info -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Client Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="client_company_name">Client Company Name</label>
                            <input type="text" name="client_company_name" id="client_company_name" class="form-control" value="{{ old('client_company_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="client_author">Client Author</label>
                            <input type="text" name="client_author" id="client_author" class="form-control" value="{{ old('client_author') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="client_role">Client Role</label>
                            <input type="text" name="client_role" id="client_role" class="form-control" value="{{ old('client_role') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="client_feedback">Client Feedback</label>
                            <textarea name="client_feedback" id="client_feedback" class="form-control" required>{{ old('client_feedback') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="client_author_image">Client Author Image</label>
                            <input type="file" name="client_author_image" id="client_author_image" class="form-control" required>
                            <div id="client_author_image_preview" class="image-preview" style="display: none;">
                                <img src="#" alt="Author Preview" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success btn-lg btn-block">Create Portfolio</button>
            </form>
            <!-- Form End -->
        </div>
    </div>
</div>

<script>
    // Preview main thumbnail
    document.getElementById('main_thumbnail').addEventListener('change', function (event) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var preview = document.getElementById('main_thumbnail_preview');
            var img = preview.querySelector('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            preview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    // Preview multiple portfolio images
    document.getElementById('images').addEventListener('change', function (event) {
        var previewContainer = document.getElementById('images_preview');
        previewContainer.innerHTML = '';
        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imgContainer = document.createElement('div');
                var img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail');
                img.style.width = '150px';
                img.style.height = '100px';
                imgContainer.appendChild(img);
                previewContainer.appendChild(imgContainer);
            };
            reader.readAsDataURL(files[i]);
        }
    });

    // Preview client author image
    document.getElementById('client_author_image').addEventListener('change', function (event) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var preview = document.getElementById('client_author_image_preview');
            var img = preview.querySelector('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            preview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
@endsection
