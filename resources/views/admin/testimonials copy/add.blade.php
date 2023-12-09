@extends('admin.layouts.app')

@section('title')
    Add Testimonals
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Add Testimonials</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Add Testimonials</li>
            </ol>
        </div>
    </div>
    <form action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data" id="image-upload">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Client's Name</label>
                            <input type="text" name="name" class="form-control" id="product-title-input" value="" placeholder="Enter Name">
                            @error('name')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Client's Designation</label>
                            <input type="text" name="profession" class="form-control" id="product-title-input" value="" placeholder="Enter Profession">
                            @error('profession')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Company Name</label>
                            <input type="text" name="company" class="form-control" id="product-title-input" value="" placeholder="Enter Comapany">
                            @error('company')
                                <div class="error"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                        <div>
                            <label>Feedback Text</label>

                            <div id="ckeditor-classic">
                                <div>
                                    <textarea name="text" class="form-control" id="exampleFormControlTextarea5" rows="5" placeholder="Enter Review Text"></textarea>
                                </div>
                                @error('text')
                                    <div class="error mt-1"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> Photo</h5>
                    </div>
                    <div class="card-body">

                                {{-- Product thumbnail image  --}}
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Client's Image</h5>
                            <p class="text-muted">Add Image.</p>
                            <div class="col-xxl-12">
                                <div>
                                    <input name="image" class="form-control" type="file" id="formFileMultiple">
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
                                <option value="1" selected>Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                <!-- end card -->

                <div class="text-start mb-3">
                    <button type="submit" class="btn btn-success w-lg ml-3">Submit</button>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </form>
@endsection





