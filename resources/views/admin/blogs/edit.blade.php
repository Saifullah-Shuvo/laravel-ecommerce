@extends('admin.layouts.app')

@section('title')
    Edit Blogs
@endsection

@section('panel')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Edit Blogs</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">Edit Blogs</li>
            </ol>
        </div>
    </div>
    <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data" id="image-upload">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-title-input">Blog Title</label>
                            <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                            <input type="text" class="form-control d-none" id="product-id-input">
                            <input type="text" name="title" class="form-control" id="product-title-input" value="{{ $blog->title }}">
                            <div class="invalid-feedback">
                                @error('title')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label>Blog Description</label>

                            <div id="ckeditor-classic">
                                <div>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea5" rows="5" placeholder="Enter slider description">{{ $blog->description }}</textarea>
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
                        <h5 class="card-title mb-0">Blog Photo</h5>
                    </div>
                    <div class="card-body">

                                {{-- Product thumbnail image  --}}
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Blog Image</h5>
                            <p class="text-muted">Add Blog Image.</p>
                            <div class="col-xxl-12">
                                <div>
                                    <input name="image" class="form-control" type="file" id="formFileMultiple">
                                    <br>
                                    <p class="text-muted">Blog Image Preview</p>
                                    <img class="rounded shadow" alt="Thambnai Image" width="300" src={{ asset('admins/blogimages/'.$blog->image) }}>
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
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2"> <a href="{{route('category.all')}}" class="float-end text-decoration-underline">Add
                                New</a>Select product category</p>
                        <select class="form-select" id="choices-category-input" name="category_id" data-choices data-choices-search-false>

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <!-- end card body -->
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Status</label>
                            <select class="form-select" name="status" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="1" {{ $blog->status == 1 ? 'selected' : '' }} >Published</option>
                                <option value="0" {{ $blog->status == 0 ? 'selected' : '' }} >Unpublished</option>
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





