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
                <form class="form-horizontal" action="{{ route('dashboard.about.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Create about</h4><hr>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Headline</label>
                            <div class="col-sm-9">
                                <input type="text" name="headline" class="form-control" placeholder="Enter headline here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Birthday</label>
                            <div class="col-sm-9">
                                <input type="date" name="birthday" class="form-control" placeholder="Enter birthday here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Website Url</label>
                            <div class="col-sm-9">
                                <input type="text" name="website" class="form-control" placeholder="Enter website url here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Image<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" onchange="previewImage(event)" required>
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
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" class="form-control" placeholder="Enter phone here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" name="city" class="form-control" placeholder="Enter city name here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Age</label>
                            <div class="col-sm-9">
                                <input type="number" name="age" class="form-control" placeholder="Enter your age here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Degree</label>
                            <div class="col-sm-9">
                                <input type="text" name="degree" class="form-control" placeholder="Enter degree here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" placeholder="Enter email here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Freelance Activity</label>
                            <div class="col-sm-9">
                                <input type="text" name="freelance" class="form-control" placeholder="Enter freelance here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Top description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" name="top_desc" class="form-control" placeholder="Enter top description here" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Sort description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" name="sort_desc" class="form-control" placeholder="Enter sort description here" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Long description</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="long_desc" class="form-control" placeholder="Enter long description here"></textarea>
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

