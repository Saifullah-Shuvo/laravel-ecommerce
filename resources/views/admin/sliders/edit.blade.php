@extends('admin.layouts.app')

@section('title')
    Edit Sliders
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Edit Sliders</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Edit Sliders</li>
            </ol>
        </div>
    </div>
    <form action="{{ route('slider.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data" id="image-upload">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Slider Title</label>
                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                            <input type="text" class="form-control d-none" id="product-id-input">
                            <input type="text" name="title" class="form-control" id="product-title-input" value="{{ $slider->title }}" placeholder="Enter slider title">
                            <div class="invalid-feedback">
                                @error('title')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label>Slider Description</label>

                            <div id="ckeditor-classic">
                                <div>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea5" rows="5" placeholder="Enter slider description">{{ $slider->description }}</textarea>
                                </div>
                                @error('description')
                                    <div class="error mt-1"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Slider Photo</h5>
                    </div>
                    <div class="card-body">

                                {{-- Product thumbnail image  --}}
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Slider Image</h5>
                            <p class="text-muted">Add slider Image.</p>
                            <div class="col-xxl-12">
                                <div>
                                    <input name="image" class="form-control" type="file" id="formFileMultiple">
                                    <br>
                                    <p class="text-muted">Thumbnail Image Preview</p>
                                    <img class="rounded shadow" alt="Thambnai Image" width="300" src={{ asset('admins/sliderimage/'.$slider->image) }}>
                                </div>
                                @error('image')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div><!--end col-->
                        </div>

                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Status</label>
                            <select class="form-select" name="status" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="1" {{ $slider->status == 1 ? 'selected' : '' }} >Published</option>
                                <option value="0" {{ $slider->status == 0 ? 'selected' : '' }} >Unpublished</option>
                            </select>
                        </div>
                    </div>
                <!-- end card -->

            </div>
            <!-- end col -->
            <div class="text-start mb-3">
                <button type="submit" class="btn btn-success w-lg">Update</button>
            </div>
        </div>
        <!-- end row -->

    </form>
@endsection





