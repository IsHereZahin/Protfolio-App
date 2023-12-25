@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div style="float: right">
                <a href="{{ route('dashboard.about.index') }}">
                    <button class="btn btn-info m-3">Show about</button>
                </a>
            </div>
        </div>
        <!-- about form -->
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('dashboard.about.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit About</h4><hr>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Headline<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="headline" class="form-control" value="{{ $about->headline }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Birthday<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="date" name="birthday" class="form-control" value="{{ $about->birthday }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Website Url<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="website" class="form-control" value="{{ $about->website }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                                <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px;">
                            </div>
                        </div>

                        <script>
                            function previewImage(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    var preview = document.getElementById('preview');
                                    preview.src = reader.result;
                                    preview.style.display = 'block';
                                }
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Phone<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" class="form-control" value="{{ $about->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">City<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="city" class="form-control" value="{{ $about->city }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Age<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="age" class="form-control" value="{{ $about->age }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Degree<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="degree" class="form-control" value="{{ $about->degree }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Email<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" value="{{ $about->email }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Freelance Activity<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="freelance" class="form-control" value="{{ $about->freelance }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Top description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" name="top_desc" class="form-control" required>{{ $about->top_desc }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Sort description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" name="sort_desc" class="form-control"  required>{{ $about->sort_desc }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Long description<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" name="long_desc" class="form-control" required>{{ $about->long_desc }}</textarea>
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

